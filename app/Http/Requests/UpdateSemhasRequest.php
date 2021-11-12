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
            'laporan_kp' => 'file|max:1024|mimetypes:application/pdf',
            'keuangan' => 'file|max:1024|mimetypes:application/pdf',
            'konsultasi' => 'file|max:1024|mimetypes:application/pdf',
        ];
    }

    public function messages()
    {
        return [
            'max' => 'File :attribute maksimal 1MB.',
            'mimetypes' => 'File :attribute harus berupa pdf.',
            'required' => 'Form tidak boleh kosong',
        ];
    }
}
