<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SlideRequest extends Request
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
            'slide' 	=> 'required|image|max:150000'
        ];
    }
    
    public function messages() {
    	return [
    			'slide.required' => 'Bạn phải upload slide image!',
    			'slide.image' 	=> 'Slide image phải là tập tin hình ảnh!',
    			'slide.max' 	=> 'Slide image có kích thước quá lớn!'
    	];
    }
}
