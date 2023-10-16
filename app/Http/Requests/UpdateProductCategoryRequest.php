<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|unique:product_categories,name,'.$this->product_category,
            'status' => 'required'
        ];
    }

    public function messages():array {
        return [
            'name.required' => 'Tên buộc phải nhập!',
            'name.min' => 'Tên phải trên 2 ký tự',
            'name.max' => 'Tên phải dưới 255 ký tự',
            'status.required' => 'Trạng thái buộc phải chọn!'
        ];
    }
}
