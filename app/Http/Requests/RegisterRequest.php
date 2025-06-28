<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'lokasi_pendaftar' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'nik' => 'required|min:16',
            'no_kk' => 'min:16',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'agama' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'pekerjaan' => 'required',
            'pedidikan_terakhir' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
        ];
    }

    public function messages()
    {
        return [
            'lokasi_pendaftar.required' => 'Kolom kota pendaftar harus di isi.',
            'name.required' => 'Kolom name harus di isi.',
            'username.required' => 'Kolom username harus di isi.',
            'password.required' => 'Kolom password harus di isi.',
            'nik.required' => 'Kolom nik harus di isi.',
            'nik.min' => 'Nik minimal 16 karakter.',
            'no_kk.min' => 'No KK minimal 16 karakter.',
            'no_hp.required' => 'Kolom no hp harus di isi.',
            'tempat_lahir.required' => 'Kolom tempat_lahir harus di isi.',
            'tanggal_lahir.required' => 'Kolom tanggal lahir harus di isi.',
            'usia.required' => 'Kolom usia harus di isi.',
            'jenis_kelamin.required' => 'Kolom jenis kelamin harus di isi.',
            'status_perkawinan.required' => 'Kolom status perkawinan harus di isi.',
            'agama.required' => 'Kolom agama di isi.',
            'kecamatan.required' => 'Kolom kecamatan di isi.',
            'kelurahan.required' => 'Kolom kelurahan di isi.',
            'pekerjaan.required' => 'Kolom pekerjaan di isi.',
            'pedidikan_terakhir.required' => 'Kolom pedidikan_terakhir di isi.',
        ];
    }
}
