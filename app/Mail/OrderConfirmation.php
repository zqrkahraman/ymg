<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Product $product, $redeemCode)
    {
        $this->order = $order;
        $this->product = $product;
        $this->redeemCode = $redeemCode;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Your Audio Tour(s) - Order Number: '.$this->order->id.'',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.order-confirmation',
            with: [
                'orderId' => $this->order->id,
                'orderName' => $this->order->isim,
                'orderLastname' => $this->order->soyisim,
                'orderQuantity' => $this->order->adet,
                'orderPhone' => $this->order->telefon,
                'orderMail' => $this->order->email,
                'orderTotalPrice' => $this->order->toplam_fiyat,
                'orderPaymentType' => $this->order->odeme_turu,
                'orderLanguage' => $this->order->dil_key,
                'orderDate' => $this->order->satis_tarihi,
                'productImages' => $this->product->resim,
                'productName' => $this->product->adi,
                'redeemCode' => $this->redeemCode,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
