<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIppRequest extends FormRequest
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
            'tahun' => 'required|integer',
            'domain' => 'required|string',
            'indikator' => 'required|array|min:1',
            'indikator.*' => 'required|string',
            'nilai' => 'required|array|min:1',
            'nilai.*' => 'required|numeric|min:0|max:100',
        ];
    }

    public function messages()
    {
        return [
            'tahun.required' => 'Kolom tahun harus diisi.',
            'tahun.integer' => 'Kolom tahun harus berupa angka.',
            'domain.required' => 'Kolom domain harus diisi.',
            'domain.string' => 'Kolom domain harus berupa teks.',

            'indikator.required' => 'Minimal satu indikator harus diisi.',
            'indikator.array' => 'Format indikator tidak valid.',
            'indikator.*.required' => 'Setiap indikator wajib diisi.',
            'indikator.*.string' => 'Indikator harus berupa teks.',

            'nilai.required' => 'Minimal satu nilai harus diisi.',
            'nilai.array' => 'Format nilai tidak valid.',
            'nilai.*.required' => 'Setiap nilai wajib diisi.',
            'nilai.*.numeric' => 'Nilai harus berupa angka.',
            'nilai.*.min' => 'Nilai minimal adalah 0.',
            'nilai.*.max' => 'Nilai maksimal adalah 100.',
        ];
    }
}
