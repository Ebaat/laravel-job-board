<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('blog');

        return [
            'title'  => "bail|required|unique:post,title,$id",
            'body'   => "bail|required|unique:post,body,$id",
            'author' => "bail|required|unique:post,author,$id",
        ];
    }


    public function messages()
    {
        return [
            'title.required' => ' field is required.',
            'body.required' => 'field is required.',
            'author.required' => 'field is required.',
        ];
    }
}
