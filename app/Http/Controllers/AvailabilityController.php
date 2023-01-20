<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
   /**
    * Show a list of all of the application's users.
    *
    * @return \Illuminate\Http\Response
    */

   public function store(Request $request)
   {
      $products = Product::where('urun_id', $request->urun_id)->first();
      
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
      
      $pax = $request->pax;
      $orjinal_price = $products->orjinal_fiyat;
      $total_price = $unit_price*$pax;

      return response()->json([
         'price' => number_format($unit_price, 2),
         'orjinal_price' => number_format($orjinal_price, 2),
         'discount_rate' => $discount_rate,
         'total_price' => number_format($total_price, 2),
         'date' => $request->date,
      ]);
   }
}
