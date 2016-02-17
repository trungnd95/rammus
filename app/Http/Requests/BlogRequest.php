<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BlogRequest extends Request
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
            'title' => 'required|unique:blogs,title',
        	'image'	=> 'required|max:15000',
        	'status'=> 'required'
        ];
    }

    public function messages() {
    	return [
    			'title.required' => 'Bạn vui lòng nhập tiêu đề bài viết!',
    			'title.unique' 	 => 'Tiêu đề đã tồn tại!',
    			'image.required' => 'Bạn vui lòng upload hình ảnh bài viết!',
    			'image.image' 	 => 'Tập tin upload không phải là tập tin hình ảnh!',
    			'image.max' 	 => 'Tập tin upload vượt quá kích thước cho phép!',
    			'status.required'=> 'Bạn vui lòng chọn trạng thái bài viết!'
    	];
    }
}
