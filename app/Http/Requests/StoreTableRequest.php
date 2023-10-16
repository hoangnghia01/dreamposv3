<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTableRequest extends FormRequest
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
            'name' => 'required|min:1|max:255|unique:tables,name',
            'status' => 'required',
            'area' => 'required',
        ];
    }

    public function messages():array {
        return [
            'name.required' => 'Tên buộc phải nhập!',
            'name.min' => 'Tên phải trên 1 ký tự',
            'name.max' => 'Tên phải dưới 255 ký tự',
            'status.required' => 'Trạng thái buộc phải chọn!',
            'area.required' => 'Khu vực buộc phải chọn!'
        ];
    }
}
