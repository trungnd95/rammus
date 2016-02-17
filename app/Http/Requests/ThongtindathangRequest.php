<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ThongtindathangRequest extends Request
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
            'email' 	=> 'required|email',
        	'hovatendem'=> 'required', 
        	'ten'		=> 'required',
        	'diachi'	=> 'required',
        	'phone'		=> 'required|numeric'
        ];
    }
    
    public function messages() {
    	return [
    		'email.required' => 'Địa chỉ email không được rỗng!',
    		'email.email' 	 => 'Địa chỉ email không đúng định dạng!',
    		'hovatendem.required' => 'Họ và tên đệm không được rỗng!',
    		'ten.required' 	 => 'Tên không được rỗng!',
    		'diachi.required'=> 'Địa chỉ không được rỗng!',
    		'phone.required' => 'Số điện thoại không được rỗng!',
    		'phone.numeric'  => 'Số điện thoại phải là số!'
    	];
    }
}
