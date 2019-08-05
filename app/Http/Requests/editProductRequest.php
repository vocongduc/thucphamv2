<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "code"=>'required|unique:products,code,'.$this->product_id.',id',
            "name"=>'required|unique:products,name,'.$this->product_id.',id',
            "price"=>'required|numeric',
            'image'=>'image',
        ];
    }

    public function messages()
    {
        return [
            'code.required'=>'Mã sản phẩm không được để trống',
            'code.unique'=>'Mã sản phẩm không được trùng',
            'name.required'=>'Tên sản phẩm không được để trống',
            'price.required'=>'Giá sản phẩm không được để trống',
            'price.numeric'=>'Mã sản phẩm phải là số',
            'image.image'=>'ảnh sai định dạng',
        ];
    }
}
