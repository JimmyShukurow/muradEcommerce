<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Brand extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];


    public function models()
    {
        return $this->hasMany(Model::class, 'brand_id', 'id');
    }
}
