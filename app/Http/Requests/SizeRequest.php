<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SizeRequest extends Request
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
            'name' 	=> 'required|unique:colors,name'
        ];
    }
    
    public function messages() {
    	return [
    		'name.required' => 'Bạn vui lòng nhập tên size!',
    		'name.unique' 	=> 'Tên size đã tồn tại!'
    	];
    }
}
