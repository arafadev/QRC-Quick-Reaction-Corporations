<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
            'lat'        => 'required|between:0,99.99',
            'lng'        => 'required|between:0,99.99',
            // 'patient_lat'        => 'required|between:0,99.99',
            // 'patient_lng'        => 'required|between:0,99.99',
            'name'       => 'nullable',
          ];
    }
}
