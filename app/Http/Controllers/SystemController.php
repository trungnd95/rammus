<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\SlideRequest;
use App\Http\Controllers\Controller;
use App\Info;
use App\Slide;
use DB;

class SystemController extends Controller
{
    /**
    *   Display infomation of about page
    */
    public function getAbout() {
    	$ab = DB::table('infos')->where('page', 'about')->first();
        // var_dump($ab);die;
    	return view('admin.system.about',compact('ab'));
    }
    
    /**
    *   Edit info of about page and save them to database
    */
    public function postAbout(AboutRequest $request) {
    	$about = array(
    					'title' 	=> $request->title,
    					'slug'		=> \Illuminate\Support\Str::slug($request->title),
    					'content' 	=> $request->content
    	);
    	$ab = Info::find($request->_id);
        // $ab = new Info();
    	$ab->content 	= serialize($about);
    	$ab->page		= 'about';
    	$ab->save();
    	$success['success'] = 'Bạn đã edit thành công trang about!';
    	return redirect()->route('admin.system.getAbout')->with($success);
    }

    /**
    *   Display infomation of contact page
    */
    public function getContact() {
    	$ct = DB::table('infos')->where('page', 'contact')->first();
    	return view('admin.system.contact', compact('ct'));
    }
    
    /**
    *   Edit info of contact page and save them to database
    */
    public function postContact(ContactRequest $request) {
    	$contact = array(
    						'email' => $request->email,
    						'phone' => $request->phone,
    						'address' => $request->address,
    						'map'	=> $request->map
    	);
    	$ct = Info::find($request->_id);
    	$ct->content 	= serialize($contact);
    	$ct->page		= 'contact';
    	$ct->save();
    	$success['success'] = 'Bạn đã edit thành công trang contact!';
    	return redirect()->route('admin.system.getContact')->with($success);
    }

    /**
    *   Add new image and content to slide
    */
    public function getSlideAdd() {
    	return view('admin.slide.add');
    }

    /**
    *   Save new image and content to database
    */
    public function postSlideAdd(SlideRequest $request) {
    	$img 		= $request->file('slide');
    	$img_name 	= $img->getClientOriginalName();
    	$slide 			= new Slide();
    	$slide->image 	= $img_name;
    	$slide->content = $request->content;
    	$slide->save();
    	$des = 'public/teamplate/img/slider';
    	$img->move($des, $img_name);    	

    	$success['success'] = 'Bạn đã tạo thành công slide';
    	return redirect()->route('admin.system.getSlideAdd')->with($success);
    }

    /**
    *   Edit image and content
    */
    public function getSlideEdit($id) {
    	$slide = Slide::where('id', $id)->first();
    	return view('admin.slide.edit', compact('slide'));
    }
    
    /**
    *   Save change to database
    */
    public function postSlideEdit(Request $request, $id) {
    	$img 		= $request->file('slide');
    	$slide 			= Slide::findOrFail($id);
    	if(isset($img)) {
    		$file = 'public/teamplate/img/slider/' . $slide->image;
    		if(file_exists($file)) {
    			unlink($file);
    		}
	    	$img_name 	= $img->getClientOriginalName();
	    	$slide->image 	= $img_name;
	    	$des = 'public/teamplate/img/slider';
	    	$img->move($des, $img_name);
    	}
    	$slide->content = $request->content;
    	$slide->save();
    	
    	$success['success'] = 'Bạn sửa thành công slide';
    	return redirect()->route('admin.system.getSlideEdit', ['id' => $id])->with($success);
    }
	
    /**
    *   Display all images for homepage slide
    */
    public function getSlideList() {
    	$slides = Slide::select('id', 'image')->orderBy('id', 'DESC')->get();
    	return view('admin.slide.list', compact('slides'));
    }
    
    /**
    *   Delete image of homepage slide
    */
    public function getSlideDelete($id) {
    	$slide = Slide::findOrFail($id);
    	$slide->delete();
    	return redirect()->route('admin.system.getSlideList');
    }
}