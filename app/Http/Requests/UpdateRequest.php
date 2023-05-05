<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required | unique:user | email',
            'phone' => 'required | unique:user',
            'address' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên hiển thị',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng đúng định dạng @',
            'email.unique' => 'Email đã được sử dụng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ];
    }
}
