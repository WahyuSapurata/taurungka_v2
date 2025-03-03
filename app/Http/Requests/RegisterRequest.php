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
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
            'no_hp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'pekerjaan' => 'required',
            'pedidikan_terakhir' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom name harus di isi.',
            'username.required' => 'Kolom username harus di isi.',
            'password.required' => 'Kolom password harus di isi.',
            'nik.required' => 'Kolom nik harus di isi.',
            'no_kk.required' => 'Kolom no kk harus di isi.',
            'no_hp.required' => 'Kolom no hp harus di isi.',
            'tempat_lahir.required' => 'Kolom tempat_lahir harus di isi.',
            'tanggal_lahir.required' => 'Kolom tanggal lahir harus di isi.',
            'usia.required' => 'Kolom usia harus di isi.',
            'jenis_kelamin.required' => 'Kolom jenis kelamin harus di isi.',
            'status_perkawinan.required' => 'Kolom status perkawinan harus di isi.',
            'agama.required' => 'Kolom agama di isi.',
            'alamat.required' => 'Kolom alamat di isi.',
            'kecamatan.required' => 'Kolom kecamatan di isi.',
            'kelurahan.required' => 'Kolom kelurahan di isi.',
            'rt.required' => 'Kolom rt di isi.',
            'rw.required' => 'Kolom rw di isi.',
            'pekerjaan.required' => 'Kolom pekerjaan di isi.',
            'pedidikan_terakhir.required' => 'Kolom pedidikan_terakhir di isi.',
        ];
    }
}
