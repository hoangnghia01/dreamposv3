<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
class StoreCashierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên buộc phải nhập!',
            'name.max' => 'Tên phải dưới 255 ký tự',
            'name.string' => 'Tên phải kiểu ký tự',
            'password.confirmed' => 'Mật khẩu xác thực không đúng',
            'email.required' => 'Tên buộc phải nhập!',
            'email.max' => 'Tên phải dưới 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'email.string' => 'Tên phải kiểu ký tự',
            'email.email' => 'Email không hợp lệ',
        ];
    }
}
