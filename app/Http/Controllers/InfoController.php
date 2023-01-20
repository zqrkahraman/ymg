<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class InfoController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request, $slug)
    {
        $language = app()->getLocale();
        $pages = Info::get();

        foreach($pages as $value){
            $export = json_decode($value->icerik, true);
            if($export["seoUrl"][$language]==$slug){
                $id = $value->id;
                $slug = $export["seoUrl"];
                $title = $export["title"][$language];
                $description = $export["description"][$language];
                $adi = $export["adi"][$language];
                $yazi = $export["yazi"][$language];
            }
        }
        
        return view('info', compact(
            'id',
            'title',
            'description',
            'adi',
            'yazi',
            'slug'
        ));
    }
}
