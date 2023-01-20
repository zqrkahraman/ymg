<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'urunler';

    public function productElections()
    {
        return $this->hasOne(ProductElections::class, 'urun_id', 'urun_id');
    }

    public function productProperties()
    {
        return $this->hasOne(ProductProperties::class, 'urun_id', 'urun_id');
    }

    public function productComments()
    {
        return $this->hasMany(ProductComments::class, 'urun_id', 'urun_id')->where('durum', '1')->orderByDesc('tarih');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImages::class, 'urun_id', 'urun_id')->orderBy('sira');
    }
}
