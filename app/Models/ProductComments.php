<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComments extends Model
{
    use HasFactory;

    protected $table = 'urun_yorumlari';

    protected $fillable = [
        'urun_id',
        'siparis_id',
        'domain_dil',
        'isim',
        'baslik',
        'yorum',
        'puan',
        'tarih',
        'durum'
    ];

    public $timestamps = false;
}
