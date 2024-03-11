<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|numeric|unique:admins,phone',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
