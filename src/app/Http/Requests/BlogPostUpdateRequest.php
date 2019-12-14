<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BlogPostCreateRequest
 */
class BlogPostUpdateRequest extends FormRequest
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
            'title'        => 'required|min:5|max:200',
            'slug'         => 'max:200',
            'content_raw'  => 'string|min:5|max:20000',
            'excerpt'      => 'string|min:5|max:500',
            'is_published' => 'boolean',
            'category_id'  => 'required|integer|exists:blog_categories,id',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок статьи',
            'content_raw.min' => 'Минимальная длина статьи :min символов'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Заголовок'
        ];
    }
}
