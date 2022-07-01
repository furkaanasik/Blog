<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'categories'    => 'required',
            'categories.*'  => 'required',
            'slug'          => 'required|string|max:15',
            'title'         => 'required|string|max:30',
            'body'          => 'required|string'
        ];
    }
}
