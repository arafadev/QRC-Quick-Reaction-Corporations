<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'email' => 'required|email|unique:providers,email,'.  $this->id,
            'phone' => 'required|numeric|unique:providers,phone,'.  $this->id,
            'delivery_price' => 'nullable|numeric',
            'details' => 'nullable|string|max:65535', 
            'map_desc'               => 'nullable',
            'lat'                    => 'required',
            'lng'                    => 'required',
            'password' => 'nullable',
            'password_confirmation' => 'nullable|same:password',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
