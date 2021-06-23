<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'name' => 'bail|required|min:30|max:300|unique:articles,name,'.$this->id,
            'avatar' => 'bail|image|max:2048',
            'description' => 'required',
            'content' => 'required|min:300',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Tên bài viết quá ngắn (nhiều hơn 30 kí tự!',
            'name.max' => 'Tên bài viết quá dài (ít hơn 300 kí tự !',
            'name.unique' => 'Tên bài viết đã tồn tại !',
            'avatar.required' => 'Vui lòng chọn hình ảnh !',
            'avatar.image' => 'Chỉ chấp nhận hình ảnh !',
            'avatar.max' => 'Hình ảnh có dung lượng không quá 2M !',
            'content.required' => 'Vui lòng nhập nội dung bài viết!',
            'content.min' => 'Nội dung quá ngắn (nhiều hơn 300 kí tự!',
            ];
    }
}
