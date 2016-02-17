<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
        	'category' 	=> 'required',
            'name' 	=> 'required|unique:products,name',
        	'image' => 'required',
        	'colors'=> 'required',
        	'sizes' => 'required',
        	'availability'=> 'required'
        ];
    }
    
    public function messages() {
    	return [
    		'category.required' => 'Bạn vui lòng chọn category!',
    		'name.required' 	=> 'Bạn vui lòng nhập tên product!',
    		'name.unique' 		=> 'Tên product đã tồn tại!',
    		'image.required' 	=> 'Bạn vui lòng chọn ảnh!',
    		'colors.required' 	=> 'Bạn vui lòng chọn màu cho sản phẩm!',
    		'sizes.required'	=> 'Bạn vui lòng chọn size cho sản phẩm!',
    		'availability.required' => 'Bạn vui lòng chọn availability !'
    	];
    }
}
