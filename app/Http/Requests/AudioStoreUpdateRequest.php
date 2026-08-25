<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudioStoreUpdateRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'title_en' => 'required|string',
            'title_bn' => 'required|string',
            'title_ab' => 'required|string',
            'des_en' => 'nullable|string',
            'des_bn' => 'nullable|string',
            'des_ab' => 'nullable|string',
            'audio_file' => 'required|mimes:mp3,wav|max:39512', // Adjust max file size as needed
        ];
    }
}
