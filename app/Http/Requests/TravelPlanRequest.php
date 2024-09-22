<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'plan' => 'required|string|max:255',
            'category' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }

    public function attributes()
    {
        return [
            'plan' => 'Travel Plan',
        ];
    }


    public function messages()
    {
        return [
            'plan.required' => 'Field :attribute tidak boleh kosong.',
            'category.required' => 'Field kategori harus dipilih.',
            'start_date.required' => 'Tanggal mulai harus diisi.',
            'end_date.required' => 'Tanggal akhir harus diisi.',
            'end_date.after_or_equal' => 'Tanggal akhir harus sama atau setelah tanggal mulai.',
        ];
    }
}
