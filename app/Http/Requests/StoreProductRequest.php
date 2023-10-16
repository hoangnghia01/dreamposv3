<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|unique:products,name',
            'product_category_id' => 'required',
            'price' => 'required|min:1|max:999999999',
            // 'discount_price' => 'required|min:1|max:999999999',
            'qty' => 'integer|min:0|max:999999999',
            'status' => 'required',
            'image' => 'image'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên buộc phải nhập!',
            'name.min' => 'Tên phải trên 2 ký tự',
            'name.max' => 'Tên phải dưới 255 ký tự',
            'product_category_id.required' => 'Danh mục buộc phải nhập!',
            'price.required' => 'Giá buộc phải nhập!',

            // 'discount_price.required' => 'Giá buộc phải nhập!',

            'qty.integer' => 'Số lượng phải là số nguyên dương',
            'qty.min' => 'Số lượng phải là số nguyên dương',
            'qty.max' => 'Số lượng phải thấp hơn 999999999',

            'status.required' => 'Trạng thái buộc phải chọn!',

        ];
    }
}
