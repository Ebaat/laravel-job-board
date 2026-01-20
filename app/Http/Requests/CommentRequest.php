<?php

namespace App\Http\Requests;

use App\Models\comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'author' => "bail|required|unique:comment,author,$id",
            'content'   => "bail|required|unique:comment,content,$id",
        ];
    }


    public function messages()
    {
        return [
            'author.required' => ' field is required.',
            'content.required' => 'field is required.',
        ];
    }
}
