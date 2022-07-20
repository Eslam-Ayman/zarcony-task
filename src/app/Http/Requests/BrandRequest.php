<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $id =  $this->brand->id ?? NULL;
        
        return [
            'title' => ['required', 'string', 'max:255', "unique:brands,title,$id,id"],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg', 'max:5000'],
        ];
    }
}
