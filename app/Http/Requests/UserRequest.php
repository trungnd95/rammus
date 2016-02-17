<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        	'email' 		=> 'required|unique:users,email|email',
        	'password' 		=> 'required',
        	'display_name' 	=> 'required'
        ];
    }
    
    public function messages() {
    	return [
    		'email.required' 	=> 'Bạn vui lòng nhập email!',
    		'email.unique' 		=> 'Email đã tồn tại!',
    		'email.email' 		=> 'Email không đúng định dạng!',
    		'password.required' => 'Bạn vui lòng nhập password!',
    		'display_name.required' => 'Bạn vui lòng nhập tên hiển thị!'
    	];
    }
}
