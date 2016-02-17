<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Blog;
use Auth, Validator;

class BlogController extends Controller
{
	/**
	*	Display page to add new blog
	*/
    public function getAdd() {
    	return view('admin.blog.add');
	}
    
	/**
	*	Save to database
	*/
	public function postAdd(BlogRequest $request) {
		$blog = new Blog();
		$img	= $request->file('image');
		$img_name = $img->getClientOriginalName();
		
		$blog->title = $request->title;
		$blog->slug  = \Illuminate\Support\Str::slug($request->title); //content
		$blog->image = $img_name;
		$blog->content 		= $request->content; //substr($string, $start, $length ):
		$blog->description 	= substr(strip_tags($request->content), 0, 80); 
		$blog->status 		= $request->status;
		$blog->user_id 		= Auth::user()->id;
		$blog->save();
		
		$des = 'public/teamplate/img/blog';
		$img->move($des, $img_name);
		// Goi route va thong bao ra man hinh
		$success['success'] = 'Bạn đã tạo thành công bài viết!';
		return redirect()->route('admin.blog.getAdd')->with($success);
	}
	
	/**
	*	Display all new in website
	*/
	public function getList($seach = '') {
		$blogs = Blog::select('id', 'title', 'status','user_id', 'created_at')->where('title', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(5);
		return view('admin.blog.list', compact('blogs', 'seach'));
	}
	
 	public function postList(Request $request) {
    	$seach = (isset($request->txtSeach)) ? $request->txtSeach : '';
		if (isset($request->apply)) {
			$validator = Validator::make($request->all(), [
					'selectDelete' 		=> 'required',
					'items'				=> 'required'
				],
				[
					'selectDelete.required' => 'Bạn chưa chọn delete!',
					'items.required' 		=> 'Bạn chưa chọn bài viết cần xóa!'
				]
			);
			
			if($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			} else {
				foreach ($request->items as $val) {
					$blog = Blog::findOrFail($val);
					$img_dir = 'public/teamplate/img/blog/' . $blog->image;
					if(file_exists($img_dir) == TRUE) {
						unlink($img_dir);
					}
					$blog->delete();
				}
				
				$success['success'] = 'Bạn đã xóa thành công bài viết';				
				return redirect('admin/blog/list/' . $seach)->with($success);
			}			
		}	else {
			return redirect('admin/blog/list/' . $seach);
		}
    }
	// Phương thức delete Blog.
	public function getDelete($id, $seach = '') {
		$blog = Blog::find($id);
		$img_dir = 'public/teamplate/img/blog/' . $blog->image;
		if(file_exists($img_dir) == TRUE) {
			unlink($img_dir);
		}
		$blog->delete();
		$success['success'] = 'Bạn đã xóa thành công bài viết';
		return redirect('admin/blog/list/' . $seach)->with($success);
	}
	// Phương thức kéo vào giao diện phần edit blog.
	public function getEdit($id) {
		$blog = Blog::select('id', 'title', 'image', 'content', 'status')->where('id', $id)->first();
		return view('admin.blog.edit', compact('id', 'blog'));
	}
	// Phương thức xử lý khi edit blog
	public function postEdit(Request $request, $id) {
		$blog = Blog::find($id);
		if($blog->title != $request->title) {
			$validator = Validator::make($request->all(), [
					'title' 	=> 'required|unique:blogs,title'
				],
				[
					'title.required' => 'Bạn vui lòng nhập tiêu đề bài viết!',
					'title.unique' 	=> 'Tiêu đề bài viết đã tồn tại!'
				]
			);
		} 
		
		if (isset($validator)) {
			return redirect('admin/blog/edit/' . $id)->withErrors($validator->errors());
		} else {			
			$img      = $request->file('image');
			if(isset($img)) {
				$img_dir = 'public/teamplate/img/blog/' . $blog->image;
				if(file_exists($img_dir) == TRUE) {
					unlink($img_dir);
				}
				
				$img	= $request->file('image');
				$img_name 			= $img->getClientOriginalName();
				$des 				= 'public/teamplate/img/blog';
				$img->move($des, $img_name);
				$blog->image 		= $img_name;
			}
			$blog->title = $request->title;
			$blog->slug  = \Illuminate\Support\Str::slug($request->title); //content
			$blog->content 		= $request->content; //substr($string, $start, $length ):
			$blog->description 	= substr(strip_tags($request->content), 0, 131);
			$blog->status 		= $request->status;
			$blog->user_id 		= Auth::user()->id;
			$blog->save();
			
			$success['success'] = 'Bạn đã edit thành bài viết!';
			return redirect()->route('admin.blog.getEdit', $id)->with($success);
		}		
	}
}