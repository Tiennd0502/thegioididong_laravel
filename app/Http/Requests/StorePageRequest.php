<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'bail|required|min:2|max:50|unique:pages,name,'.$this->id,
            'link'=>'unique:pages,link,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 2 kí tự!',
            'name.max' => 'Vui lòng nhập ít hơn 50 kí tự !',
            'name.unique' => 'Tên trang đã tồn tại!',
            'link.unique' => 'Link liên kết đã tồn tại!',
        ];
    }
}
