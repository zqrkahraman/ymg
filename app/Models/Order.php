<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'siparisler_yeni';

    protected $fillable = [
        'urun_id',
        'isim',
        'soyisim',
        'telefon',
        'email',
        'odeme_turu',
        'adet',
        'birim_fiyat',
        'toplam_fiyat',
        'para_birimi_id',
        'durum',
        'satis_tarihi',
        'dil_key',
        'secret_key',
        'indirim_kodu_id',
    ];

    public $timestamps = false;
}
