<?php

namespace App\Http\Requests\Api;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'service_ids'           => 'required|array',
            'service_ids.*'         => 'exists:services,id',
            'provider_id'           => 'required|exists:providers,id',
            'patient_map_desc'      => 'required|string',
            'patient_lng'           => 'required|max:9',
            'patient_lat'           => 'required|max:9',
            'hospital_map_desc'     => 'nullable|string',
            'hospital_lng'          => 'nullable|max:9',
            'hospital_lat'          => 'nullable|max:9',
            'date'                  => 'required|date',
            'time'                  => 'nullable',
            'notes'                 => 'nullable|max:300',
            'payment_method'        => 'required|in:cash',
        ];
    }
    protected function prepareForValidation()
    {
        $date = Carbon::createFromFormat('d-m-Y', $this->date);
        $this->merge(['date' => $date->format('Y-m-d')]);
    }
}
