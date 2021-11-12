<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'unique' => ':Attribute telah terdaftar.',
            'required' => 'Silahkan isi :attribute terlebih dahulu.',
            'numeric' => ':Attribute harus berupa angka.',
            // 'min' => ':Attribute minimal 8 angka.',
        ];
    }
}
