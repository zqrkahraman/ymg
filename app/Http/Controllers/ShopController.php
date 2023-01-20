<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $language = Language::where('dil_key', app()->getLocale())->get();

        if ($request->path()=='popular'){
            $products = Product::where('durum', 1)->
                where('dil_id', $language[0]['id'])->
                where('adi', '!=', '-')->
                where('resim', '!=', '')->
                limit(30)->
                with('productElections','productProperties','productComments')->
            get();
            $filter_title = "Popular";
            $filter_description = "Popular Description";
        }
        else if ($request->path()=='new-audio-guides'){
            $products = Product::where('durum', 1)->
                where('dil_id', $language[0]['id'])->
                where('adi', '!=', '-')->
                where('resim', '!=', '')->
                join('urun_ozellikleri', 'urun_ozellikleri.urun_id', '=', 'urunler.urun_id')->
                where('urun_ozellikleri.yeni_urun', '=', '1')->
                with('productElections','productProperties','productComments')->
            get();
            $filter_title = "New";
            $filter_description = "New Description";
        }
        else if ($request->path()=='best-city'){
            $products = Product::where('durum', 1)->
                where('dil_id', $language[0]['id'])->
                where('adi', '!=', '-')->
                where('resim', '!=', '')->
                limit(20)->
                with('productElections','productProperties','productComments')->
            get();
            $filter_title = "Best Cities";
            $filter_description = "Best Cities Description";
        }
        else if ($request->path()=='all'){
            $products = Product::where('durum', 1)->
                where('dil_id', $language[0]['id'])->
                where('adi', '!=', '-')->
                where('resim', '!=', '')->
                with('productElections','productProperties','productComments')->
            get();
            $filter_title = "All";
            $filter_description = "All Description";
        }
        else{
            $products = Product::where('durum', 1)->
                where('dil_id', $language[0]['id'])->
                where('adi', '!=', '-')->
                where('resim', '!=', '')->
                limit(10)->
                inRandomOrder()->
                with('productElections','productProperties','productComments')->
            get();
        }

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

            // Ürün yorumları
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

            // Ürün kategorileri
            $ana_kategori_id_bul = DB::table('urunlerin_ana_kategorileri')->where('urun_id', $value->urun_id)->first();
            $alt_kategori_id_bul = DB::table('urunlerin_kategorileri')->where('urun_id', $value->urun_id)->first();

            $country = Country::where('durum', 1)->where('id', $ana_kategori_id_bul->ana_kategori_id ?? '')->first();
            $country_slugs[] = isset($country) ? json_decode($country["sef_link"], true) : [app()->getLocale() => ''];

            $city = City::where('durum', 1)->where('id', $alt_kategori_id_bul->kategori_id ?? '')->first();
            $city_slugs[] = isset($city) ? json_decode($city["sef_link"], true) : [app()->getLocale() => ''];
        }

        $products2 = Product::where('durum', 1)->
            where('dil_id', $language[0]['id'])->
            where('adi', '!=', '-')->
            where('resim', '!=', '')->
            join('urun_ozellikleri', 'urun_ozellikleri.urun_id', '=', 'urunler.urun_id')->
            where('urun_ozellikleri.yeni_urun', '=', '1')->
            limit(10)->
            inRandomOrder()->
            with('productElections','productProperties','productComments')->
        get();

        foreach($products2 as $key => $value){
            // Ürün seçimleri -> ürün icon eklentileri
            $product_addition = json_decode($products2[$key]->productElections->urun_icon_eklentileri, true);
            $addition2[] = [
                "saatIconlar" => $product_addition["saatIconlar"][app()->getLocale()],
                "istasyoIconlar" => $product_addition["istasyoIconlar"][app()->getLocale()],
                "mesafeIconlar" => $product_addition["mesafeIconlar"][app()->getLocale()],
            ];

            // Ürün seçimleri -> audioguides dilleri
            $audioguides_language2[] = json_decode($products2[$key]->productElections->audio_guides_dilleri, true);
            
            // Ürün özellikleri -> yeni ürün
            $properties2[] = [
                "new_product" => $products2[$key]->productProperties->yeni_urun,
            ];

            // Ürün yorumları -> 
            $toplam = 0;
            $comments = $products2[$key]->productComments ?? '';
            foreach($comments as $comment){
                $toplam+=$comment["puan"];
            }

            $comments_count2 = count($comments);
            $comments_count_2[$value['urun_id']] = [count($comments)];
            if($comments_count2==0){
                $raiting2[$value['urun_id']] = ['0'];
                $star2[$value['urun_id']] = ['0'];
            }
            else{
                $raiting2[$value['urun_id']] = [round(($toplam/$comments_count2),2)];
                $star2[$value['urun_id']] = [(($toplam/$comments_count2)*100)/5];
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
                    $discount_rate2[] = $discount_rate_return;
                }
                else{
                    // standart indirim oranını buluyoruz.
                    $discount_rate2[] = round(100-($value->fiyat*100/$value->orjinal_fiyat),2);
                }
            }
            else{
                $discount_rate2[] = 0;
            }

            // Fiyatlar
            if (session()->has('discountCode')){
                // Affiliate kodu varsa indirim oranına göre hesaplanıp birim fiyatı elde ediliyor.
                $unit_price2[] = $value->orjinal_fiyat-(($value->orjinal_fiyat*$discount_rate2[$key])/100);
            }
            else{
                // Direk birim fiyatı elde ediliyor.
                $unit_price2[] = $value->fiyat;
            }

            // Ürün kategorileri
            $ana_kategori_id_bul = DB::table('urunlerin_ana_kategorileri')->where('urun_id', $value->urun_id)->first();
            $alt_kategori_id_bul = DB::table('urunlerin_kategorileri')->where('urun_id', $value->urun_id)->first();

            $country = Country::where('durum', 1)->where('id', $ana_kategori_id_bul->ana_kategori_id ?? '')->first();
            $country_slugs2[] = isset($country) ? json_decode($country["sef_link"], true) : [app()->getLocale() => ''];

            $city = City::where('durum', 1)->where('id', $alt_kategori_id_bul->kategori_id ?? '')->first();
            $city_slugs2[] = isset($city) ? json_decode($city["sef_link"], true) : [app()->getLocale() => ''];
        }

        $countries = Country::where('durum', 1)->orderBy('siralama')->get();

        if (in_array($request->path(), ['popular', 'new-audio-guides', 'best-city', 'all'])){
            return view('filter', compact(
                'products', 
                'unit_price',
                'addition',
                'properties',
                'audioguides_language',
                'comments_count',
                'raiting',
                'star',
                'discount_rate',
                'country_slugs',
                'city_slugs',
                'countries',
                'filter_title',
                'filter_description',
            ));
        }
        else{
            return view('shop', compact(
                'products', 
                'unit_price',
                'addition',
                'properties',
                'audioguides_language',
                'comments_count',
                'raiting',
                'star',
                'discount_rate',
                'country_slugs',
                'city_slugs',
                'products2', 
                'unit_price2',
                'addition2',
                'properties2',
                'audioguides_language2',
                'comments_count_2',
                'raiting2',
                'star2',
                'discount_rate2',
                'country_slugs2',
                'city_slugs2',
                'countries',
            ));
        }
    }
}
