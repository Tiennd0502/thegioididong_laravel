<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id'=> 'required|integer',
            'brand_id'=> 'required|integer',
            'name'=> 'required|min:5|max:100|unique:products,name,'.$this->id,
            'price' =>'bail|required|min:5|max:9',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng chọn danh mục!',
            'category_id.integer'=> 'Giá trị danh mục phải là số!',
            'brand_id.required' => 'Vui lòng chọn thương hiệu!',
            'brand_id.integer'=> 'Giá trị thương hiệu phải là số!',
            'name.required' => 'Vui lòng nhập tên!',
            'name.unique' => 'Tên này đã tồn tại. Xin hãy chọn tên khác!',
            'name.min' => 'Vui lòng nhập ít nhất 4 kí tự!',
            'name.max' => 'Vui lòng nhập it hơn 100 kí tự !',
            'price.required'=> 'Vui lòng nhập giá bán',
            'price.min'=>'Giá bán không nhỏ hơn 100000 vnđ',
            'price.max'=>'Giá bán không lớn hơn 999.999.999 vnđ',
        ];
    }
}
