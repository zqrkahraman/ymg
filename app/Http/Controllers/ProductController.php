<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request, $get_country, $get_city, $get_product)
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
        }

        $language = Language::where('dil_key', app()->getLocale())->get();
        $products = Product::where('sef_link', $get_product)->with('productElections','productProperties','productComments','productImages')->first();
        
        if($language[0]['id']==1){$dil=2;}else{$dil=1;}
        $products_de = Product::where('urun_id', $products->urun_id)->where('dil_id', $dil)->first();
        if($language[0]['id']==1){
            $jsonData='{"en":"'.$products->sef_link.'","de":"'.$products_de->sef_link.'"}';
        }
        else{
            $jsonData='{"en":"'.$products_de->sef_link.'","de":"'.$products->sef_link.'"}';
        }
        
        $product_slug = json_decode($jsonData);
        $product_id = $products->urun_id;
        $name = $products->adi;
        $meta_title = $products->meta_title;
        $meta_description = $products->meta_description;
        $stock_status = $products->stok_durumu;
        $orjinal_fiyat = $products->orjinal_fiyat;

        // YMG api key
        $response = Http::get('https://api.yourmobileguide.com/v1/tours/purchase/public/purchaseHidden?tourId='.$products->audio_urun_id.'&email=amlug@me.com');
        $api_key = $response->body();

        // Ürün seçimleri -> ürün icon eklentileri
        $product_addition = json_decode($products->productElections->urun_icon_eklentileri, true);
        $addition = [
            "saatIconlar" => $product_addition["saatIconlar"][app()->getLocale()],
            "istasyoIconlar" => $product_addition["istasyoIconlar"][app()->getLocale()],
            "mesafeIconlar" => $product_addition["mesafeIconlar"][app()->getLocale()],
        ];

        // Ürün seçimleri -> audioguides dilleri
        $audioguides_language = json_decode($products->productElections->audio_guides_dilleri, true);
    
        // Ürün özellikleri -> yeni ürün
        $properties = [
            "new_product" => $products->productProperties->yeni_urun ?? [],
        ];

        // Ürün yorumları -> 
        $toplam = 0;
        $comments = $products->productComments ?? '';
        foreach($comments as $comment){
            $toplam+=$comment["puan"];
        }

        $comments_count = count($comments);
        if($comments_count==0){
            $raiting = 0;
            $star = 0;
        }
        else{
            $raiting = round(($toplam/$comments_count),2);
            $star = (($toplam/$comments_count)*100)/5;
        }
        
        // İndirim oranı
        if($products->orjinal_fiyat>0){
            if ($request->session()->has('discountCode')) {
                // affiliate kodu geldiyse ona göre indirim oranını buluyoruz.
                $discount_rate_return = 0;
                foreach ($request->attributes->get('afiliate_attributes') as $attributes) {
                    if($attributes['product_id'] == $products->urun_id){
                        $discount_rate_return = $attributes['discount_rate'];
                    }
                }
                $discount_rate = $discount_rate_return;
            }
            else{
                // standart indirim oranını buluyoruz.
                $discount_rate = round(100-($products->fiyat*100/$products->orjinal_fiyat),2);
            }
        }
        else{
            $discount_rate = 0;
        }

        // Fiyatlar
        if (session()->has('discountCode')){
            // Affiliate kodu varsa indirim oranına göre hesaplanıp birim fiyatı elde ediliyor.
            $unit_price = $products->orjinal_fiyat-(($products->orjinal_fiyat*$discount_rate)/100);
        }
        else{
            // Direk birim fiyatı elde ediliyor.
            $unit_price = $products->fiyat;
        }

        // Ürün resimleri
        $images = $products->productImages ?? '';

        // Ürün açıklamaları
        $description = json_decode($products->productElections->urun_ek_aciklamalar, true);

        // // return response()->json([
        // //     'info' => $city_slug,
        // // ]);

        return view('product', compact(
            'product_id',
            'name',
            'product_slug',
            'stock_status',
            'description',
            'addition',
            'properties',
            'audioguides_language',
            'comments_count',
            'raiting',
            'star',
            'discount_rate',
            'unit_price',
            'orjinal_fiyat',
            'country_name',
            'country_slug',
            'images',
            'city_name',
            'city_slug',
            'meta_title',
            'meta_description',
            'comments',
            'api_key',
        ));
    }
}
