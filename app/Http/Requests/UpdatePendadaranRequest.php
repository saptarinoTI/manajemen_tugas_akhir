<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePendadaranRequest extends FormRequest
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
            'konsultasi' => 'max:1024|image|mimes:jpeg,png,jpg',
            'perkuliahan' => 'file|max:1024|mimetypes:application/pdf',
            'keuangan' => 'file|max:1024|mimetypes:application/pdf',
            'perpustakaan' => 'file|max:1024|mimetypes:application/pdf',
            'laboratorium' => 'file|max:1024|mimetypes:application/pdf',
            'action' => 'file|max:1024|mimetypes:application/pdf',
            'kompetensi' => 'file|max:1024|mimetypes:application/pdf',
            'toefl' => 'file|max:1024|mimetypes:application/pdf',
            'ijazah' => 'max:1024|image|mimes:jpeg,png,jpg',
            'ktp' => 'max:1024|image|mimes:jpeg,png,jpg',
            'akte' => 'max:1024|image|mimes:jpeg,png,jpg',
            'foto' => 'max:1024|image|mimes:jpeg,png,jpg',
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
