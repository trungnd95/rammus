<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThongtindathangRequest;
use App\Http\Requests\CateRequest;
use App\Http\Requests;
use App\Product;
use App\Contact;
use App\Thongtindathang;
use DB, Cart, Validator, Mail;
use PhpParser\Node\Expr\AssignOp\Concat;

class WelcomeController extends Controller {
   
    public function home() {
    	$seach = '';
    	if(!empty($_GET) && isset($_GET['seach'])) {
    		$seach = $_GET['seach'];
    	}
    	$products = DB::table('products')->select('id', 'name', 'slug', 'price', 'image', 'cate_id', 'size', 'color')->where('name', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(6);
        return view('teamplate.page.home', compact('products'));
    }
    
    public function sanpham($id, $tenloai) {
   		$seach = '';
    	if(!empty($_GET) && isset($_GET['seach'])) {
    		$seach = $_GET['seach'];
    	}
    	$products = DB::table('products')->select('id', 'name', 'slug', 'price', 'image', 'cate_id', 'size', 'color')->where('cate_id', $id)->where('name', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(6);
        return view('teamplate.page.category', compact('products'));
    }
    
    public function chitietsanpham($id) {
    	$product 			= DB::table('products')->where('id', $id)->first();
    	$related_product 	= DB::table('products')->select('id', 'name', 'slug', 'price', 'image', 'cate_id', 'size', 'color')->where('cate_id', $product->cate_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->skip(0)->take(8)->get();
        return view('teamplate.page.product', compact('product', 'related_product'));
    }
    
    public function muahang($id, $size, $color, $qty) {
    	$product_by = DB::table('products')->where('id', $id)->first();
    	
    	$data_img = explode(',', $product_by->image);
    	$img = DB::table('uploads')->select('name')->where('id', $data_img[0])->first();
    	if(file_exists('resources/upload/images/' . $img->name)) {
    		$imgUrl = url('resources/upload/images/' . $img->name);
    	} else { $imgUrl = ''; }
    	
    	Cart::add(array('id' => $id, 'name' => $product_by->name, 'qty' => $qty, 'price' => $product_by->price, 'options' => array('size' => $size, 'color' => $color, 'img' => $imgUrl)));
    	$content = Cart::content();
    	return redirect()->route('giohang');
    }
	
    public function giohang() {
    	$content 	= Cart::content();
    	$total 		= Cart::total();;
    	return view('teamplate.page.cart', compact('content', 'total'));
    }
    
    public function xoasanpham($rowID) {
    	Cart::remove($rowID);
    	return redirect()->route('giohang');
    }
    
    public function updatesanpham($rowid, $qty) {
    	Cart::update($rowid, $qty);
    	return redirect()->route('giohang');
    }
    
    public function about() {
    	return view('teamplate.page.about');
    }

    public function contact() {
    	return view('teamplate.page.contact');
    }
    
    public function postContact(Request $request) {
    	$validator = Validator::make($request->all(), [
    			'your_name' => 'required',
    			'email'		=> 'required|email',
    			'message'	=> 'required'		
    		],
    		[
    			'your_name.required'=> 'Tên người gửi không được để trống!',
    			'email.required' 	=> 'Địa chỉ email không được để trống!',
    			'email.email'		=> 'Địa chỉ email không đúng định dạng!',
    			'message.required'	=> 'Message không được để trống!'
    		]
    	);
    	if($validator->fails()) {
    		return redirect()->back()->withErrors($validator->errors());
    	} else {
    		$contact = new Contact();
    		$contact->your_name = $request->your_name;
    		$contact->email		= $request->email; //message
    		$contact->content	= $request->message;
    		$contact->seen		= 'no';
    		$contact->answer	= 'no';
    		$contact->save();
    		$success['success'] = 'Cảm ơn bạn đã gửi liên hệ cho chúng tôi, chúng tôi sẽ liên lạc lại với bạn trong thời gian sớm nhất!';
    		return redirect()->route('contact')->with($success);
    	}
    }

    public function blog() {
    	$blogs = DB::table('blogs')->where('status', 'publish')->orderBy('id', 'DESC')->paginate(4);
    	return view('teamplate.page.blog', compact('blogs'));
    }

    public function baiviet($id) {
    	$blog = DB::table('blogs')->where('id', $id)->first();
    	return view('teamplate.page.blog_details', compact('blog'));
    }

    public function dathang(ThongtindathangRequest $request) {
    	$content 	= Cart::content();
    	$thongtindathang = new Thongtindathang();
    	$thongtindathang->email 			= $request->email;
    	$thongtindathang->hovatendem 		= $request->hovatendem;
    	$thongtindathang->ten 				= $request->ten;
    	$thongtindathang->diachi 			= $request->diachi;
    	$thongtindathang->dienthoai 		= $request->phone; //, 'tinhtrang'
    	$thongtindathang->thongtindonhang 	= serialize($content);
    	$thongtindathang->tinhtrang 		= 0;
    	$thongtindathang->save();
    	// Goi route va thong bao ra man hinh
    	$success['success'] = 'Cảm ơn bạn đã đặt hàng, chúng tôi sẽ giao hàng trong thời gian sớm nhất!';
    	return redirect()->route('giohang')->with($success);
    }
}