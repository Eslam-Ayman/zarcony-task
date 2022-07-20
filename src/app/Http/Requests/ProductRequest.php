<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        // check if update request or store request
        $id =  $this->product->id ?? NULL;
        
        return [
            'brand_id' => ['required', 'exists:brands,id'],
            'sku' => ['required', 'string', "unique:products,sku,$id,id"],
            'title' => ['required', 'string', 'max:255', "unique:products,title,$id,id"],
            'details' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:5000'],
        ];
    }
}
