<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id =  $this->user->id ?? NULL;
        
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$id,id"],
            'mobile_no' => ['required', 'digits:11', 'max:255', "unique:users,mobile_no,$id,id"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_super_admin' => ['nullable', 'boolean'],
        ];
    }
}
