<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'string',
            'description'=>'string',
            'category_id'=>'exists:categories,id',
            'type_id'=>'exists:types,id',
            'price'=>'numeric',
            'file_id'=>'nullable',
            'image_id'=>'nullable',
        ];
    }
}
