<?php

namespace App\Http\Requests\API\V1\Article;

use Illuminate\Foundation\Http\FormRequest;

class FetchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'search' => 'string',
            'sort' => 'string',
            'categories' => 'string'
        ];
    }
}
