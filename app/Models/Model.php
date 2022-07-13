<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id', 'brand_id');
    }
}
