<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyeksiRequest extends FormRequest
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
            'tahun' => 'required',
            'proyeksi' => 'required',
            'capaian' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tahun.required' => 'Kolom tahun harus di isi.',
            'proyeksi.required' => 'Kolom proyeksi harus di isi.',
            'capaian.required' => 'Kolom capaian harus di isi.',
        ];
    }
}
