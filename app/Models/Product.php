<?php

namespace App\Models;

use App\Models\Model as ModelsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Traits\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $guarded = [];
    public $translatable = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products');
    }

    public function previewImage()
    {
        return $this->morphOne(config('media-library.media_model'), 'model')
            ->where('collection_name', 'default')
            ->where('order_column', 1);
    }

    public function getMainImageUrlAttribute(): string
    {
        return $this->previewImage->getFirstMediaUrl();
    }

    public function inBasket()
    {
        return $this->belongsTo(Basket::class,'id', 'product_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function model()
    {
        return $this->hasOne(ModelsModel::class, 'id', 'model_id');
    }
}
