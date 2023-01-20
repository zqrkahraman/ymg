<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Language;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $keys = [
            "home-text", 
            "home-btn", 
            "home-text2",
            "ana-b-1",
            "ana-b-2",
            "ana-b-3",
            "ana-b-4",
            "ana-b-5",
            "ana-b-6",
            "ana-b-7",
            "ana-b-8",
            "ana-b-9",
            "ana-b-10",
            "wie_es_funktioniert",
            "wahlen_sie_ihren",
            "erhaltensieperemail",
            "startensieihreaudiotour",
            "siekonnendietour",
            "audioguides",
            "jetztentdecken",
            "see-all-audio-guides",
            "audiguideswoundwie",
            "walking-one",
            "walking-two",
            "bus-one",
            "bus-two",
            "car-one",
            "car-two",
            "bike-one",
            "bike-two",
            "wasunsereautorensagen",
            "asama-btn",
            "four-steps-title",
            "four-steps-1",
            "four-steps-2",
            "four-steps-3",
            "four-steps-4",
        ];

        $status = [
            "1",
            "2",
        ];

        $language = Language::where('dil_key', app()->getLocale())->get();
        $dil_id = $language[0]['id'];
        $ceviriler = Home::whereIn('ceviri_key', $keys)->whereIn('dil_id', $status)->get();
        $products = Product::where('durum', 1)->
            where('dil_id', $dil_id)->
            where('adi', '!=', '-')->
            where('resim', '!=', '')->
            limit(10)->
            orderByDesc('id')->
            with('productElections','productProperties','productComments')->
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
                if($comment["puan"]==1 || $comment["puan"]==2){
                    $toplam+=1*50;
                }
                elseif($comment["puan"]==3){
                    $toplam+=3*100;
                }
                elseif($comment["puan"]==4){
                    $toplam+=4*400;
                }
                elseif($comment["puan"]==5){
                    $toplam+=5*500;
                }
            }

            $comments_count[$value['urun_id']] = [count($comments)];
            $raiting[$value['urun_id']] = [round(($toplam/1100),2)];
            $star[$value['urun_id']] = [(($toplam/1100)*100)/5];

            // İndirim oranı
            if($value->orjinal_fiyat>0){
                $discount_rate[] = 100-($value->fiyat*100/$value->orjinal_fiyat);
            }
            else{
                $discount_rate[] = 0;
            }
        }

        return view('home', compact(
            'ceviriler', 
            'products', 
            'addition',
            'properties',
            'audioguides_language',
            'comments_count',
            'raiting',
            'star',
            'discount_rate',
            'dil_id',
        ));
    }
}
