<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'page_id'=> 'bail|required|',
            'name'  => 'bail|required|min:5|max:50|unique:sliders,name,'.$this->id,
            'link'  => 'bail|required|min:5|max:150',
            'avatar' => 'bail|required|image|max:2048',
            'position' => 'bail|required|integer|min:1',
        ];
    }
    public function messages(){
        return [
            'page_id.required'   => 'Vui lòng chọn trang hiển thị !',
            'name.required'   => 'Vui lòng nhập tên!',
            'name.min'        => 'Vui lòng nhập ít nhất 5 kí tự!',
            'name.max'        => 'Vui lòng nhập ít hơn 50 kí tự !',
            'name.unique'        => 'Slider đã tồn tại!',
            'link.required'   => 'Vui lòng nhập link!',
            'link.min'        => 'Vui lòng nhập ít nhất 5 kí tự!',
            'link.max'        => 'Vui lòng nhập ít hơn 150 kí tự !',
            'avatar.required'  => 'Vui lòng chọn hình ảnh !',
            'avatar.image'     => 'Chỉ chấp nhận hình ảnh !',
            'avatar.max'       => 'Hình ảnh có dung lượng không quá 2M',
            'position.required' => 'Vui lòng nhập thứ tự xuất hiện',
            'position.integer' => 'Giá trị phải là số!',
            'position.min' => 'Giá trị phải lớn hơn 0!',

        ];
    }
}
