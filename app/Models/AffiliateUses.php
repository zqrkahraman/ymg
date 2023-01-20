<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateUses extends Model
{
    use HasFactory;

    protected $table = 'indirim_kodu_kullanimlari';

    protected $fillable = [
        'indirim_kodu_id',
        'siparis_id',
        'indirim_miktari',
        'kazanc_miktari',
        'para_birimi_id',
        'odeme_turu',
        'durum',
        'tarih',
    ];

    public $timestamps = false;
}
