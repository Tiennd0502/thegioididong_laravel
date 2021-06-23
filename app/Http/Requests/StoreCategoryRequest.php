<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'bail|required|min:4|max:50|unique:categories,name,'.$this->id,
            'position' => 'bail|required|integer|min:1',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.min' => 'Vui lòng nhập ít nhất 4 kí tự!',
            'name.max' => 'Vui lòng nhập it hơn 50 kí tự !',
            'name.unique' => 'Danh mục đã tồn tại !',
            'position.required' => 'Vui lòng nhập vị trí!',
            'position.integer'=> 'Vui lòng nhập giá trị phải là số!',
            'position.min'=> 'Giá trị nhập phải lớn hơn 0!',

        ];
    }
}
