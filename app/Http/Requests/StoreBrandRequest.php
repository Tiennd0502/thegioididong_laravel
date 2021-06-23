<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'category_id'=> 'required',
            'name' => 'bail|required|min:2|max:50',
            'avatar' => 'bail|required|image|max:2048',
            'position' => 'bail|required|integer|min:1',
            
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng chọn danh mục !',
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 2 kí tự!',
            'name.max' => 'Vui lòng nhập ít hơn 50 kí tự !',
            'avatar.required' => 'Vui lòng chọn hình ảnh !',
            'avatar.image' => 'Chỉ chấp nhận hình ảnh !',
            'avatar.max' => 'Hình ảnh có dung lượng không quá 2M !',
            'position.required' => 'Vui lòng nhập vị trí!',
            'position.integer'=> 'Vui lòng nhập giá trị phải là số!',
            'position.min'=> 'Giá trị phải lớn hơn 0!',
        ];
    }
}
