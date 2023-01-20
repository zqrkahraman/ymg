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

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Congratulations! New order arrived!',
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
            view: 'emails.order-success',
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
                'productName' => $this->product->adi,
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
