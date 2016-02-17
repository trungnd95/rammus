<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateRequest;
use App\Libs\Html\HtmlCategory;
use App\Cate;
use File, Validator;

class CateController extends Controller
{
    /**
    *	Add new cateogry page
    */
    public function getAdd() {
    	$parent_cate = Cate::select('id', 'name', 'parent_id')->get()->toArray();
    	$objCategory = new HtmlCategory();
    	return view('admin.cate.add', compact('parent_cate', 'objCategory'));
    }
    
    /**
    *	Save info just added to database
    */
    public function postAdd(CateRequest $request) {
    	$cate = new Cate();
    	$cate->name 		= $request->name;
    	$cate->slug 		= \Illuminate\Support\Str::slug($request->name);    	   	
    	$cate->icon 		= $request->icon;
    	$cate->image 		= $request->image; 	
    	$cate->order 		= $request->order;
    	$cate->description 	= $request->description;
    	$cate->parent_id 	= $request->parent;
    	$cate->save();
    	
    	$success['success'] = 'Bạn đã tạo thành công category';
    	return redirect()->route('admin.cate.getAdd')->with($success);
    }
	
	/**
	*	List all category
	*/
    public function getList($seach = '') {
    	$cates = Cate::select('id', 'name', 'slug', 'icon', 'parent_id')->where('name', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(5);
    	return view('admin.cate.list', compact('cates', 'seach'));
    }
    
    /**
    *	If checkbox to delete many cate, it handle there
    */
    public function postList(Request $request) {
    	$seach = (isset($request->txtSeach)) ? $request->txtSeach : '';
		if (isset($request->apply)) {
			$validator = Validator::make($request->all(), [
					'selectDelete' 		=> 'required',
					'items'				=> 'required'
				],
				[
					'selectDelete.required' => 'Bạn chưa chọn delete!',
					'items.required' 		=> 'Bạn chưa chọn category cần xóa!'
				]
			);
			
			if($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			} else {
				foreach ($request->items as $val) {
					$cate = Cate::findOrFail($val);
					$cate->delete();
				}
				
				$success['success'] = 'Bạn đã xóa thành công category';				
				return redirect('admin/cate/list/' . $seach)->with($success);
			}			
		}	else {
			return redirect('admin/cate/list/' . $seach);
		}
    }
	
	/**
	*	handle when delete single cate
	*/
	public function getDelete($id, $seach = '') {
		$cate = Cate::find($id);
		$cate->delete();
		$success['success'] = 'Bạn đã xóa thành công category';
		return redirect('admin/cate/list/' . $seach)->with($success);
	}
	
	/**
	*	Edit cate
	*/
	public function getEdit($id) {
		$parent_cate = Cate::select('id', 'name', 'parent_id')->get()->toArray();
		$objCategory = new HtmlCategory();
		$cate = Cate::select('id', 'name', 'image', 'order', 'icon', 'parent_id', 'description')->where('id', $id)->first();
		return view('admin.cate.edit', compact('objCategory', 'parent_cate', 'cate'));
	}
	
	/**
	*	Save info after edit cate
	*/
	public function postEdit(Request $request, $id) {
		$cate = Cate::find($id);
		if($cate->name != $request->name) {
			$validator = Validator::make($request->all(), [
				'name' 	=> 'required|unique:cates,name'
				],
				[
					'name.required' => 'Bạn vui lòng nhập tên Category!',
					'name.unique' 	=> 'Tên category đã tồn tại!'
				]
			);
		} 
		if ($validator->fails()) {
			return redirect('admin/cate/edit/' . $id)->withErrors($validator->errors());
		} else {
			$cate->name 		= $request->name;
			$cate->slug 		= \Illuminate\Support\Str::slug($request->name);
			$cate->icon 		= $request->icon;
			$cate->image 		= $request->image;
			$cate->order 		= $request->order;
			$cate->description 	= $request->description;
			$cate->parent_id 	= $request->parent;
			$cate->save();
			// Goi route va thong bao ra man hinh
			$success['success'] = 'Bạn đã edit thành công category';
			return redirect('admin/cate/edit/' . $id)->with($success);
		}		
	}
}