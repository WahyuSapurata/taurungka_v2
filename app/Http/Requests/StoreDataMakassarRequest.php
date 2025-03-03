<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataMakassarRequest extends FormRequest
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
            'nama' => 'required',
            'nilai' => 'required',
            'satuan' => 'required',
            'icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Kolom nama harus di isi.',
            'nilai.required' => 'Kolom nilai harus di isi.',
            'satuan.required' => 'Kolom satuan harus di isi.',
            'icon.required' => 'Kolom icon harus di isi.',
        ];
    }
}
