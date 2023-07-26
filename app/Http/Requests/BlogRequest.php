<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'id_blog' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'file_upload' => 'required',
            'views' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không được bỏ trống!',
            'id_blog.required' => 'Không được bỏ trống!',
            'summary.required' => 'Không được bỏ trống',
            'content.required' => 'Không được bỏ trống',
            'file_upload.required'  =>'Chưa chọn file upload',
            'views.required'=>"không được để trống"
        ];

    }
}
