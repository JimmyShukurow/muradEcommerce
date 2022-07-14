<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use App\Traits\HasTranslations;


class Model extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id', 'brand_id');
    }
}
