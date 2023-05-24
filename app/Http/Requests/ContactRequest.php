<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'username' => 'required | unique:user',
            'email' => 'required | email',
            'subject' => 'required',
            'content' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng đúng định dạng @',
            'subject.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng nhập nội dung',
        ];
    }
}
