<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }


    public function subs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
