<?php

namespace App\Http\Requests\API\V1\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'string|max:255|unique:articles,title',
            'category.*'    => 'string|exists:categories,id',
            'headline_photo' => 'image',
            'content'       => 'string'
        ];
    }
}
