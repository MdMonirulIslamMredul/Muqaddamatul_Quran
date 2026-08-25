<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TvStoreRequest extends FormRequest
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
            'title_en' => 'nullable|string',
            'title_bn' => 'nullable|string',
            'title_ab' => 'nullable|string',
            'embed_video' => 'nullable|string',
            'file_upload' => 'nullable|file|mimes:mp4,mov,ogg,webm|max:39512',
        ];
    }
}
