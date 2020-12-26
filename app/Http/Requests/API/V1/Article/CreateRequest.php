<?php

namespace App\Http\Requests\API\V1\Article;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|string|max:255|unique:articles,title',
            'category.*'    => 'required|string|exists:categories,id',
            'headline_photo' => 'required|image',
            'content'       => 'required|string'
        ];
    }
}
