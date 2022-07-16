<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y H:i:s');
    }
}
