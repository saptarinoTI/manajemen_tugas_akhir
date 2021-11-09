<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemhasRequest extends FormRequest
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
            'krs' => 'file|max:1024|mimetypes:application/pdf',
            'transkip_nilai' => 'file|max:1024|mimetypes:application/pdf',
            'laporan_kp' => 'max:1024|image|mimes:jpeg,png,jpg',
            'keuangan' => 'max:1024|image|mimes:jpeg,png,jpg',
            'konsultasi' => 'max:1024|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'max' => 'File :attribute maksimal 1MB.',
            'mimetypes' => 'File :attribute harus berupa pdf.',
            'mimes' => 'File :attribute harus berupa jpeg, jpg dan png.',
            'image' => 'File :attribute harus berupa gambar.',
        ];
    }
}
