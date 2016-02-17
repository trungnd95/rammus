<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ColorRequest extends Request
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
            'name' 	=> 'required|unique:colors,name',
        	'code' 	=> 'required'
        ];
    }
    
    public function messages() {
    	return [
    		'name.required' => 'Bạn vui lòng nhập tên màu!',
    		'name.unique' 	=> 'Tên màu đã tồn tại!',
    		'code.required' => 'Bạn vui lòng nhập mã màu!'
    	];
    }
}
