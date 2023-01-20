<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Mail\OrderSuccess;
use App\Models\Affiliate;
use App\Models\AffiliateUses;
use App\Models\Order;
use App\Models\Product;
use Error;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::isEmpty()){
            return redirect()->route('home');
        }
        return view('payment-detail');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $cart = Cart::getContent();
        $first_cart = collect($cart)->first();   

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        header('Content-Type: application/json');
        
        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
				// 'name' => $first_cart->name,
				// 'description' => 'Order ID: ...',
				//'images' => [''.$first_cart->attributes->products->resim.''],
                'amount' => number_format(($first_cart->attributes->total_price*100) , 0, '', ''),
                'currency' => 'eur',
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $attributes = $request->validate([
            'urun_id' => 'required|integer',
            'isim' => 'required|string',
            'soyisim' => 'required|string',
            'telefon' => 'required|string',
            'email' => 'required|string',
            'odeme_turu' => 'required|in:stripe,free',
            'adet' => 'required|integer',
            'birim_fiyat' => 'required|regex:/^\d{0,8}(\.\d{1,4})?$/',
            'toplam_fiyat' => 'required|regex:/^\d{0,8}(\.\d{1,4})?$/',
            'para_birimi_id' => 'required|in:1',
            'durum' => 'nullable|in:0,1',
            'satis_tarihi' => 'nullable',
            'dil_key' => 'required|in:en,de',
            'secret_key' => 'required|string',
        ]);

        if(session()->has('discountCode')){
            $discount_code = session()->get("discountCode");
            $afilliate = Affiliate::where('indirim_kodu', $discount_code)->with('affiliateCategories')->get();
            $attributes['indirim_kodu_id'] = $afilliate[0]->id;
        }
        else{
            $attributes['indirim_kodu_id'] = 0;
        }

        $order = Order::create($attributes);

        if(session()->has('discountCode')){
            $discount_rate = 0;
            $amount_of_earnings = 0;
            foreach ($request->attributes->get('afiliate_attributes') as $attributes) {
                if($attributes['product_id'] == $request->urun_id){
                    $discount_rate = $attributes['discount_rate'];
                    $amount_of_earnings = $attributes['amount_of_earnings'];
                }
            }

            $indirimli_fiyat = $request->orj_toplam_fiyat-(($request->orj_toplam_fiyat*$discount_rate)/100);
            $indirim_miktari = $request->orj_toplam_fiyat-$indirimli_fiyat;
            $kazanc_miktari = ($indirimli_fiyat * $amount_of_earnings)/100;

            $affiliate_uses = [
                'indirim_kodu_id' => $afilliate[0]->id,
                'siparis_id' => $order->id,
                'indirim_miktari' => number_format($indirim_miktari,2),
                'kazanc_miktari' => number_format($kazanc_miktari,2),
                'para_birimi_id' => $request->para_birimi_id,
                'durum' => 1,
                'tarih' => strtotime($request->satis_tarihi),
            ];

            AffiliateUses::create($affiliate_uses);
        }

        return response()->json($order);


        // return $affiliate_uses;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function completed(Request $request)
    {

        if(isset($request->secret_key)){
            $secret_key = $request->secret_key;
        }
        else{
            $secret_key = $request->payment_intent_client_secret;
        }
        $get_order = $request->order;

        Order::where('id', $get_order)->where('secret_key', $secret_key)->update(['satis_durum' => 'success','durum' => '1']);

        $order = Order::where('id', $get_order)->where('secret_key', $secret_key)->first();
        $products = Product::where('urun_id', $order->urun_id)->where('dil_id', 1)->first();

        $redeemCode = "";

        for ($i=1; $i <= $order->adet; $i++) { 
            $response = Http::get('https://api.yourmobileguide.com/v1/tours/purchase/public/purchaseHidden?tourId='.$products->audio_urun_id.'&email=amlug@me.com');        
            $api_key = json_decode($response->body(), true);

            $redeemCode.= '<p style="font-size: 14px; line-height: 110%;">'.$i.' Activation Code: <span style="font-size: 20px; line-height: 22px;"><strong>'.$api_key["code"].'</strong></span><span style="font-size: 12px; line-height: 13.2px;"></span></p>';
        }

        if(Cart::isEmpty() || empty($order)){
            return redirect()->route('home');
        }

        //Mail::to("ok@istanbulwelcomecard.com")->send(new OrderSuccess($order,$products));
        //Mail::to("ok@istanbulwelcomecard.com")->send(new OrderConfirmation($order,$products,$redeemCode));

        return view('completed');
    }
}
