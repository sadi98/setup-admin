<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            "name" => ["required", "string"],
            "slug" => ["required", "string"],
            "description" => ["required"],
            "image" => ["nullable", "mimes:jpg,jpeg,png"],
            "meta_title" => ["required", "string"],
            "meta_keyword" => ["required", "string"],
            "meta_description" => ["required", "string"],
        ];
    }
}
