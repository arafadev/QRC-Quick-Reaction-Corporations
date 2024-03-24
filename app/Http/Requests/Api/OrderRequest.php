<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'service_ids' => 'required|array',
            'service_ids.*' => 'exists:services,id',
            'provider_id'           => 'required|exists:providers,id',
            'patient_lat'        => 'required|between:0,99.99',
            'patient_lng'        => 'required|between:0,99.99',
        ];
    }
}
