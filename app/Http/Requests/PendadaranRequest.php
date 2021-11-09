<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendadaranRequest extends FormRequest
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
            'mahasiswa_nim' => 'required',
            'krs' => 'required|file|max:1024|mimetypes:application/pdf',
            'transkip_nilai' => 'required|file|max:1024|mimetypes:application/pdf',
            'konsultasi' => 'required|max:1024|image|mimes:jpeg,png,jpg',
            'perkuliahan' => 'required|file|max:1024|mimetypes:application/pdf',
            'keuangan' => 'required|file|max:1024|mimetypes:application/pdf',
            'perpustakaan' => 'required|file|max:1024|mimetypes:application/pdf',
            'laboratorium' => 'required|file|max:1024|mimetypes:application/pdf',
            'action' => 'required|file|max:1024|mimetypes:application/pdf',
            'kompetensi' => 'required|file|max:1024|mimetypes:application/pdf',
            'toefl' => 'required|file|max:1024|mimetypes:application/pdf',
            'ijazah' => 'required|max:1024|image|mimes:jpeg,png,jpg',
            'ktp' => 'required|max:1024|image|mimes:jpeg,png,jpg',
            'akte' => 'required|max:1024|image|mimes:jpeg,png,jpg',
            'foto' => 'required|max:1024|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'File :attribute wajib diisi.',
            'max' => 'File :attribute maksimal 1MB.',
            'mimetypes' => 'File :attribute harus berupa pdf.',
            'mimes' => 'File :attribute harus berupa jpeg, jpg dan png.',
            'image' => 'File :attribute harus berupa gambar.',
        ];
    }
}
