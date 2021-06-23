<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name' => 'bail|required|min:4|max:100',
            'image' => 'bail|image|max:2048',
            'position' => 'bail|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 5 kí tự!',
            'name.max' => 'Vui lòng nhập ít hơn 100 kí tự !',
            'image.image' => 'Chỉ chấp nhận hình ảnh !',
            'image.max' => 'Hình ảnh có dung lượng không quá 2M',
            'position.integer'=> 'Vui lòng nhập giá trị phải là số!',
            'position.min'=> 'Giá trị phải lớn hơn 0!',
        ];
    }
}
