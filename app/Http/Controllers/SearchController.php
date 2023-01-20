<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {   
        $value = $_GET['searchTerm'];
        $language = Language::where('dil_key', app()->getLocale())->get();
        $products = Product::
            where('adi', 'like', '%'.$value.'%')->
            where('dil_id', $language[0]['id'])->
            where('adi', '!=', '-')->
            where('resim', '!=', '')->
            with('productImages')->
        get();

        foreach ($products as $item) {
            $ana_kategori_id_bul = DB::table('urunlerin_ana_kategorileri')->where('urun_id', $item->urun_id)->first();
            $alt_kategori_id_bul = DB::table('urunlerin_kategorileri')->where('urun_id', $item->urun_id)->first();

            $country = Country::where('durum', 1)->where('id', $ana_kategori_id_bul->ana_kategori_id ?? '')->first();
            $country_slug = json_decode($country["sef_link"], true);

            $city = City::where('durum', 1)->where('id', $alt_kategori_id_bul->kategori_id ?? '')->first();
            $city_slug = json_decode($city["sef_link"], true);

            $data[] = [
                'id' => $item->id, 
                'urun_id' => $item->urun_id, 
                'title' => $item->adi, 
                'images' => $item->resim, 
                'slug' => $item->sef_link, 
                'dil_id' => app()->getLocale(),
                'country_slug' => $country_slug[app()->getLocale()],
                'city_slug' => $city_slug[app()->getLocale()]
            ];
        }
        
        
        echo json_encode($data);
    }
}
