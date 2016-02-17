<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Hash, Validator, Auth;

class UserController extends Controller
{
	public function getList($seach = '') {
		$users = User::select('id','password', 'email', 'display_name', 'level', 'status')->where('display_name', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(5);
		return view('admin.user.list', compact('users', 'seach'));
	}
	
	public function postList(Request $request) {
		$seach = (isset($request->txtSeach)) ? $request->txtSeach : '';
		
		return redirect('admin/user/list/' . $seach);
	}
	
    public function getAdd() {
    	return view('admin.user.add');
	}

	public function postAdd(UserRequest $request) {
		$user = new User();
		
		$img      = $request->file('avatar');
		if(isset($img)) {
			$img_name = $img->getClientOriginalName();
			$des = 'public/avatar';
			$img->move($des, $img_name);
		} else $img_name = '';
		
		$user->email 			= $request->email;
		$user->password 		= Hash::make($request->password);
		$user->first_name 		= $request->first_name;
		$user->last_name 		= $request->last_name;
		$user->display_name 	= $request->display_name;
		$user->avatar 			= $img_name;
		$user->level 			= $request->level;
		$user->status 			= $request->status;
		$user->remember_token 	= $request->_token;
		$user->save();
		
		$success['success'] = 'Bạn đã tạo thành công user';
		return redirect()->route('admin.user.getAdd')->with($success);
	}
	
	public function getDelete($id) {
		$delete = FALSE;
		//Get info of current user
		$auth = Auth::user();
		
		// If current user is super admin, allow delete, edit another user. But don't allow delete itselves
		if($auth->id != $id && $auth->level == 0) {
			$user = User::findOrFail($id);
			// Delete file Img
			if($user['avatar'] != '') {
				$filename = 'public/avatar/' . $user['avatar'];
				unlink($filename);
			}
			// Delete User
			$user->delete();
			$delete = TRUE;
		}

		// If current user is admin. Allow delete user whom have lower permision than 
		if($auth->id != $id && $auth->level == 1) {
			$user = User::findOrFail($id);
			$level = $user->level;
			if($level > 1) {
				// Delete file Img
				if($user['avatar'] != '') {
					$filename = 'public/avatar/' . $user['avatar'];
					unlink($filename);
				}
				// Delete User
				$user->delete();
				$delete = TRUE;
			}
		}
		
		if($delete == TRUE) {
			$success['success'] = 'alert-success';
		} else {
			$success['success'] = 'alert-danger';
		}
		
		return redirect()->route('admin.user.list')->with($success);
	}

	public function getEdit($id) {
		$user = User::find($id);
		return view('admin.user.edit', compact('user', 'id'));
	}

	public function postEdit(Request $request, $id) {	
		$auth = Auth::user();
		if($auth->level == 0) {
			$user = User::find($id);
			$validator = Validator::make($request->all(), [
					'display_name' 		=> 'required'
				],
				[
					'display_name.required' => 'Tên hiển thị không được để trống!'
				]
			);
			if($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			} else {
				
				$img      = $request->file('avatar');
				if(isset($img)) {
					if($user['avatar'] != '') {
						$filename = 'public/avatar/' . $user['avatar'];
						unlink($filename);
					}					
					$img_name = $img->getClientOriginalName();
					$des = 'public/avatar';
					$img->move($des, $img_name);
					$user->avatar 			= $img_name;
				}
				
				$user->password 		= Hash::make($request->password);
				$user->first_name 		= $request->first_name;
				$user->last_name 		= $request->last_name;
				$user->display_name 	= $request->display_name;
				if($user->level != 0) {
					$user->level 			= $request->level;
				}
				$user->status 			= $request->status;
				$user->remember_token 	= $request->_token;
				$user->save();
				
				$success['success'] = 'Bạn đã edit thành công user';
				return redirect()->route('admin.user.getEdit', $id)->with($success);
			}
		} else {
			$success['success'] = 'Sorry, bạn không được thực hiện chức năng này!';
			return redirect()->route('admin.user.getEdit', $id)->with($success);
		}
	}
}
