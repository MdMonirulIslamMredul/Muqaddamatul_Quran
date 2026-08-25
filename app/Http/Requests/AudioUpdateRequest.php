<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudioUpdateRequest extends FormRequest
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
            'audio_file' => 'nullable|mimes:mp3,wav|max:39512', // Adjust max file size as needed
        ];
    }
}
