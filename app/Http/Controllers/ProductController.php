<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Libs\Html\HtmlCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Http\Requests\SizeRequest;
use App\Http\Requests\ProductRequest;
use App\Cate;
use App\Color;
use App\Size;
use App\Product;
use Validator, Auth;

class ProductController extends Controller
{
	//======= Size Start ========//
	public function getSize() {
		return view('admin.product.sizeindex');
	}
	public function postSizeAdd(SizeRequest $request) {
		$size = new Size();
		$size->name = $request->name;
		$size->save();
	
		$success['success'] = 'Bạn đã tạo thành công size!';
		return redirect()->route('admin.product.getSize')->with($success);
	}
	
	public function getSizeDelete($id) {
		$size = Size::findOrFail($id);
		$size->delete();
	
		$success['success'] = 'Bạn đã xóa thành công size';
		return redirect()->route('admin.product.getSize')->with($success);
	}
	
	public function getSizeEdit($id) {
		$size = Size::select('name')->where('id', $id)->first();
		return view('admin.product.sizeedit', compact('size', 'id'));
	}
	
	public function postSizeEdit(Request $request, $id) {
		$size = Size::findOrFail($id);
		if($request->name != $size->name) {
			$v = Validator::make($request->all(),
				[
						'name' 	=> 'required|unique:sizes,name'
				],
				[
						'name.required' => 'Bạn vui lòng nhập tên size!',
						'name.unique' 	=> 'Tên size đã tồn tại!'
				]
			);
		}
		if($v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		} else {
			$size->name = $request->name;
			$size->save();
	
			$success['success'] = 'Bạn đã edit thành công size!';
			return redirect()->route('admin.product.getSizeEdit', $id)->with($success);
		}
	}
	//======= Size End ========//
	//======= Color Start ========//
	public function getColor() {
		return view('admin.product.colorindex');
	}

	public function postColorAdd(ColorRequest $request) {
		$color = new Color();
		$color->name = $request->name;
		$color->code = $request->code; 
		$color->save();
		
		$success['success'] = 'Bạn đã tạo thành công màu';
		return redirect()->route('admin.product.getColor')->with($success);
	}
	
	public function getColorDelete($id) {
		$color = Color::findOrFail($id);
		$color->delete();

		$success['success'] = 'Bạn đã xóa thành công màu';
		return redirect()->route('admin.product.getColor')->with($success);
	}

	public function getColorEdit($id) {
		$color = Color::select('name', 'code')->where('id', $id)->first();
		return view('admin.product.coloredit', compact('color', 'id'));
	}
	
	public function postColorEdit(Request $request, $id) {
		$color = Color::findOrFail($id);
		if($request->name != $color->name) {
			$v = Validator::make($request->all(),
				[
					'name' 	=> 'required|unique:colors,name',
        			'code' 	=> 'required'
				],
				[
					'name.required' => 'Bạn vui lòng nhập tên màu!',
			    	'name.unique' 	=> 'Tên màu đã tồn tại!',
			    	'code.required' => 'Bạn vui lòng nhập mã màu!'
				]
			);	
			
		} 
		if($v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		} else {
			$color->name = $request->name;
			$color->code = $request->code;
			$color->save();
				
			$success['success'] = 'Bạn đã edit thành công màu';
			return redirect()->route('admin.product.getColorEdit', $id)->with($success);
		}
	}
	//======= Color End ========//
    public function getAdd() {
    	$parent_cate = Cate::select('id', 'name', 'parent_id')->get()->toArray();
    	$objCategory = new HtmlCategory();    	
    	return view('admin.product.add', compact('parent_cate', 'objCategory'));
	}
    
	public function postAdd(ProductRequest $request) {
// 		unserialize($str)
// 		serialize($value)
		$product = new Product();
		$product->name 	= $request->name;
		$product->slug  = \Illuminate\Support\Str::slug($request->name);
		$product->price = $request->price;
		$product->info 	= $request->info;
		$product->color = serialize($request->colors);
		$product->size  = serialize($request->sizes);
		$product->availability = $request->availability;
		$product->image = $request->image;
		$product->user_id = Auth::user()->id;
		$product->cate_id = $request->category;
		$product->save();
		// Goi route va thong bao ra man hinh
		$success['success'] = 'Bạn đã tạo thành công product!';
		return redirect()->route('admin.product.getAdd')->with($success);
	}
	// Phuong thuc hien thi danh sach cac product
	public function getList($seach = '') {
		$products = Product::select('id', 'name', 'price', 'availability', 'user_id', 'cate_id', 'created_at')->where('name', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(5);
		return view('admin.product.list', compact('products', 'seach'));
	}
	// Phương thức xử lý khi các hành động trên trang list category được gửi lên.
	public function postList(Request $request) {
		$seach = (isset($request->txtSeach)) ? $request->txtSeach : '';
		if (isset($request->apply)) {
			$validator = Validator::make($request->all(), [
					'selectDelete' 		=> 'required',
					'items'				=> 'required'
				],
				[
					'selectDelete.required' => 'Bạn chưa chọn delete!',
					'items.required' 		=> 'Bạn chưa chọn product cần xóa!'
				]
			);
			
			if($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			} else {
				foreach ($request->items as $val) {
					$product = Product::findOrFail($val);
					$product->delete();
				}
				
				$success['success'] = 'Bạn đã xóa thành công product';				
				return redirect('admin/product/list/' . $seach)->with($success);
			}			
		}	else {
			return redirect('admin/product/list/' . $seach);
		}
	}
	// Phương thức delete product.
	public function getDelete($id, $seach = '') {
		$product = Product::find($id);
		$product->delete();
		$success['success'] = 'Bạn đã xóa thành công product';
		return redirect('admin/product/list/' . $seach)->with($success);
	}
	// Phương thức kéo vào giao diện phần edit product.
	public function getEdit($id) {
		$parent_cate = Cate::select('id', 'name', 'parent_id')->get()->toArray();
		$objCategory = new HtmlCategory();
		$product = Product::select('id', 'name', 'price', 'color', 'size', 'availability', 'info', 'image', 'cate_id')->where('id', $id)->first();
		return view('admin.product.edit', compact('objCategory', 'parent_cate', 'product'));
	}
	// Phương thức xử lý khi edit product
	public function postEdit(Request $request, $id) {
		$product = Product::find($id);
		if($product->name != $request->name) {
			$validator = Validator::make($request->all(), [
		        	'category' 	=> 'required',
		            'name' 	=> 'required|unique:products,name',
		        	'image' => 'required',
		        	'colors'=> 'required',
		        	'sizes' => 'required',
		        	'availability'=> 'required'
		        ],
				[
					'category.required' => 'Bạn vui lòng chọn category!',
		    		'name.required' 	=> 'Bạn vui lòng nhập tên product!',
		    		'name.unique' 		=> 'Tên product đã tồn tại!',
		    		'image.required' 	=> 'Bạn vui lòng chọn ảnh!',
		    		'colors.required' 	=> 'Bạn vui lòng chọn màu cho sản phẩm!',
		    		'sizes.required'	=> 'Bạn vui lòng chọn size cho sản phẩm!',
		    		'availability.required' => 'Bạn vui lòng chọn availability !'
				]
			);
		} 
		if ($validator->fails()) {
			return redirect('admin/product/edit/' . $id)->withErrors($validator->errors());
		} else {
			$product->name 	= $request->name;
			$product->slug  = \Illuminate\Support\Str::slug($request->name);
			$product->price = $request->price;
			$product->info 	= $request->info;
			$product->color = serialize($request->colors);
			$product->size  = serialize($request->sizes);
			$product->availability = $request->availability;
			$product->image = $request->image;
			$product->user_id = Auth::user()->id;
			$product->cate_id = $request->category;
			$product->save();
			// Goi route va thong bao ra man hinh
			$success['success'] = 'Bạn đã edit thành công product';
			return redirect('admin/product/edit/' . $id)->with($success);
		}
	}
}