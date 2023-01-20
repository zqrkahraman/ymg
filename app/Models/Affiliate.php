<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $table = 'indirim_kodlari';

    public function affiliateCategories()
    {
        return $this->hasMany(AffiliateCategories::class, 'indirim_kodu_id', 'id');
    }
}
