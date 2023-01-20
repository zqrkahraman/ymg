<?php

namespace App\Http\Controllers;

use App\Models\ProductComments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'urun_id' => 'required|integer',
            'siparis_id' => 'nullable',
            'domain_dil' => 'required|string',
            'isim' => 'required|string|min:3',
            'baslik' => 'required|string|min:3',
            'yorum' => 'required|string|min:10',
            'puan' => 'required|integer',
            'tarih' => 'required|integer',
            'durum' => 'required|integer',
        ]);

        $comment = ProductComments::create($attributes);

        return response()->json($comment);
    }
}
