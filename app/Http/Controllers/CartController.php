<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    /**
    * Show a list of all of the application's users.
    *
    * @return \Illuminate\Http\Response
    */

    public function store(Request $request)
    {
        $products = Product::findOrFail($request->urun_id);

        Cart::clear();

        // $saleCondition = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => 'SALE 5%',
        //     'type' => 'tax',
        //     'value' => '-5%',
        // ));

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

        Cart::add(array(
            'id' => $products->urun_id,
            'name' => $products->adi,
            'price' => $unit_price,
            'quantity' => $request->pax,
            'attributes' => array(
                'images' => $products->resim,
                'date' => $request->date,
                'total_price' => $unit_price*$request->pax,
                'orj_total_price' => $products->orjinal_fiyat*$request->pax,
                'discount_rate' => $discount_rate,
            ),
            'associatedModel' => $products,
        ));

        // Cart::addItemCondition($products->urun_id, $saleCondition);
   }
}
