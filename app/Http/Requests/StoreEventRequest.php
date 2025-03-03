<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'nama_event' => 'required',
            'tanggal_event' => 'required',
            'kouta_kegiatan' => 'required',
            'konten_kegiatan' => 'required',
            'tempat' => 'required',
            'banner' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_event.required' => 'Kolom nama event harus di isi.',
            'tanggal_event.required' => 'Kolom tanggal event harus di isi.',
            'kouta_kegiatan.required' => 'Kolom kuota harus di isi.',
            'konten_kegiatan.required' => 'Kolom konten harus di isi.',
            'tempat.required' => 'Kolom tempat harus di isi.',
            'banner.required' => 'Kolom banner harus di isi.',
        ];
    }
}
