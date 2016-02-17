<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Upload;
use Request, Validator, Auth;

class UploadController extends Controller
{
	public function getList() {
		$upload = Upload::select('id', 'name', 'url', 'user_id', 'created_at', 'updated_at')->orderBy('id', 'DESC')->paginate(15);
		return view('admin.media.list', compact('upload'));
	}
	
	// Phương thức xử lý khi các hành động trên trang list category được gửi lên.
	public function postList() {

		if (isset($_POST['apply'])) {
			foreach ($_POST['items'] as $id) {
				$file = Upload::findOrFail($id);
				$file_path = 'resources/upload/images/' . $file->name;
				if(file_exists($file_path)) {
					unlink($file_path);
				}
				$file->delete();
			}
	
			$success['success'] = 'Bạn đã xóa thành công tập tin!';	
			return redirect('admin/upload/list/')->with($success);
		}
	}
	
	public function getAdd() {
		return view('admin.media.add');
	}

	public function postAdd() {
		if(Request::ajax()) {
			$requesAll = Request::all();
			$validate = Validator::make($requesAll,
				[
					'files' => 'image|max:150000'
				],
				[
					'files.image' => 'Tập tin không phải là tập tin hình ảnh!',
					'files.max'	  => 'Tập tin có kích thước quá lớn!'	
				]
			);

			$file = Request::file('files');
			$upload = new Upload();
			foreach ($file as $item) {
				$size = $item->getSize();
				$img_name = date("smdy_") . $item->getClientOriginalName();
				$des = 'resources/upload/images/';
				$abc = $item->move($des, $img_name);
				
				$upload->name 		= $img_name;
				$upload->type 		= $item->getClientOriginalExtension();
				$upload->size 		= $size;
// 				$upload->size 		= 1;
				$upload->url 		= url('resources/upload/images/' . $img_name);
				$upload->title 		= $img_name;
				$upload->user_id 	= Auth::user()->id;
				$upload->save();
			}
		}
	}

	public function delete($id) {
		$file = Upload::findOrFail($id);
		$file_path = 'resources/upload/images/' . $file->name;
		if(file_exists($file_path)) {
			unlink($file_path);
		}
		$file->delete();
		$success['success'] = 'Bạn đã xóa thành công tập tin!';
		return redirect('admin/upload/list/')->with($success);
	}

	public function getEdit($id) {
		$img = Upload::select('id', 'title', 'url', 'type', 'size', 'caption', 'alt_text', 'description', 'user_id', 'created_at', 'updated_at')->where('id', $id)->first();
		return view('admin.media.edit', compact('img'));
	}
	
	public function postEdit(\Illuminate\Http\Request $request, $id) {
		$file = Upload::find($id);
		$file->title 		= $request->title;
		$file->caption 		= $request->caption;
		$file->alt_text 	= $request->alttext;
		$file->description = $request->description;
		$file->save();
		$success['success'] = 'Bạn đã cập nhật thành công tập tin!';
		return redirect('admin/upload/edit/' . $id)->with($success);
	}
	
	public function upload() {
		return view('admin.media.upload');
	}
}