<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required",
            "description" => "required",
            "category_id" => "required",
            "price" => "required",
            "quantity" => "required",
            "brand_id" => "nullable",
            "model_id" => "nullable",
            "size" => "nullable",
        ];
    }
}
