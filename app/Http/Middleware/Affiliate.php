<?php

namespace App\Http\Middleware;

use App\Models\Affiliate as ModelsAffiliate;
use Closure;
use Illuminate\Http\Request;
use App\Models\Language;

class Affiliate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(isset($request->discountCode)){
            $afilliate = ModelsAffiliate::where('durum', 1)->
                where('indirim_kodu', $request->discountCode)->
                where('baslangic_tarihi', '<=', strtotime(date('Y-m-d')))->
                where('bitis_tarihi', '>=', strtotime(date('Y-m-d')))->
                with('affiliateCategories')->
            first();

            if($afilliate){
                session(['discountCode' => $request->discountCode]);
            }
        }
        
        // Affiliate kodu varsa ürünlerin indirim miktarlarını buluyoruz.
        if ($request->session()->has('discountCode')) {
            $discount_code = $request->session()->get('discountCode');

            $afilliate = ModelsAffiliate::where('durum', 1)->
                where('indirim_kodu', $discount_code)->
                where('baslangic_tarihi', '<=', strtotime(date('Y-m-d')))->
                where('bitis_tarihi', '>=', strtotime(date('Y-m-d')))->
                with('affiliateCategories')->
            first();

            $afiliate_attributes = [];
            if($afilliate){
                foreach($afilliate->affiliateCategories as $value){
                    $afiliate_attributes[] = [
                        'product_id' => $value->urun_id,
                        'discount_rate' => $value->indirim_miktari,
                        'amount_of_earnings' => $value->kazanc_miktari,
                    ];
                }
            }
            
            // Bulunan indirim miktarlarını request ile controllerlara gönderiyoruz.
            $request->attributes->set('afiliate_attributes',  $afiliate_attributes); 
        }
        
        return $next($request);
    }
}
