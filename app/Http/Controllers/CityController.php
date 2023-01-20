<?php

namespace App\Http\Controllers;

use App\Models\CategoryCity;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Product;

class CityController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request, $get_country, $get_city)
    {   
        $countries = Country::where('durum', 1)->whereJsonContains('sef_link', [app()->getLocale() => $get_country])->get();
        foreach ($countries as $country){
            $country_id = $country["id"];
            $country_name = json_decode(stripcslashes($country["adi"]), true);
            $country_slug = json_decode($country["sef_link"], true);
        }

        $main_cities = City::where('durum', 1)->whereJsonContains('sef_link', [app()->getLocale() => $get_city])->get();
        foreach ($main_cities as $main_city){
            $city_id = $main_city["id"];
            $city_name = json_decode(stripcslashes($main_city["adi"]), true);
            $city_slug = json_decode($main_city["sef_link"], true);
            $city_meta_title = json_decode(stripcslashes($main_city["meta_kategori"]), true);
            $city_meta_description = json_decode(stripcslashes($main_city["meta_description"]), true);
        }

        $category_ids = CategoryCity::where('ana_kategori_id', $country_id)->get();
        foreach ($category_ids as $category_id){
            $sub_category_ids[] = $category_id["kategori_id"];
        }
        $cities[] = City::whereIn('id', $sub_category_ids)->get();

        $language = Language::where('dil_key', app()->getLocale())->get();
        $products = Product::where('durum', 1)->
            where('dil_id', $language[0]['id'])->
            where('adi', '!=', '-')->
            where('resim', '!=', '')->
            join('urunlerin_kategorileri', 'urunlerin_kategorileri.urun_id', '=', 'urunler.urun_id')->
            where('urunlerin_kategorileri.kategori_id', '=', $city_id)->
            orderByDesc('sira')->
            with('productElections','productProperties','productComments')->
            select('urunler.*','urunlerin_kategorileri.kategori_id')->
        get();
        
        foreach($products as $key => $value){
            // Ürün seçimleri -> ürün icon eklentileri
            $product_addition = json_decode($products[$key]->productElections->urun_icon_eklentileri, true);
            $addition[] = [
                "saatIconlar" => $product_addition["saatIconlar"][app()->getLocale()],
                "istasyoIconlar" => $product_addition["istasyoIconlar"][app()->getLocale()],
                "mesafeIconlar" => $product_addition["mesafeIconlar"][app()->getLocale()],
            ];

            // Ürün seçimleri -> audioguides dilleri
            $audioguides_language[] = json_decode($products[$key]->productElections->audio_guides_dilleri, true);
            
            // Ürün özellikleri -> yeni ürün
            $properties[] = [
                "new_product" => $products[$key]->productProperties->yeni_urun,
            ];

            // Ürün yorumları -> 
            $toplam = 0;
            $comments = $products[$key]->productComments ?? '';
            foreach($comments as $comment){
                $toplam+=$comment["puan"];
            }

            $comments_count2 = count($comments);
            $comments_count[$value['urun_id']] = [count($comments)];
            if($comments_count2==0){
                $raiting[$value['urun_id']] = ['0'];
                $star[$value['urun_id']] = ['0'];
            }
            else{
                $raiting[$value['urun_id']] = [round(($toplam/$comments_count2),2)];
                $star[$value['urun_id']] = [(($toplam/$comments_count2)*100)/5];
            }
            
            // İndirim oranı
            if($value->orjinal_fiyat>0){
                if ($request->session()->has('discountCode')) {
                    // affiliate kodu geldiyse ona göre indirim oranını buluyoruz.
                    $discount_rate_return = 0;
                    foreach ($request->attributes->get('afiliate_attributes') as $attributes) {
                        if($attributes['product_id'] == $value['urun_id']){
                            $discount_rate_return = $attributes['discount_rate'];
                        }
                    }
                    $discount_rate[] = $discount_rate_return;
                }
                else{
                    // standart indirim oranını buluyoruz.
                    $discount_rate[] = round(100-($value->fiyat*100/$value->orjinal_fiyat),2);
                }
            }
            else{
                $discount_rate[] = 0;
            }

            // Fiyatlar
            if (session()->has('discountCode')){
                // Affiliate kodu varsa indirim oranına göre hesaplanıp birim fiyatı elde ediliyor.
                $unit_price[] = $value->orjinal_fiyat-(($value->orjinal_fiyat*$discount_rate[$key])/100);
            }
            else{
                // Direk birim fiyatı elde ediliyor.
                $unit_price[] = $value->fiyat;
            }
        }

        // return response()->json([
        //     'info' => $city_slug,
        // ]);

        return view('city', compact(
            'products', 
            'unit_price',
            'addition',
            'properties',
            'audioguides_language',
            'comments_count',
            'raiting',
            'star',
            'discount_rate',
            'country_name',
            'country_slug',
            'city_name',
            'city_slug',
            'city_meta_title',
            'city_meta_description',
            'cities',
        ));
    }
}