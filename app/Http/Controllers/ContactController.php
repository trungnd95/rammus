<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB, Validator;
use App\Contact;

class ContactController extends Controller
{
	/**
	*	Display contact list page
	*/
    public function getList($seach = '') {
    	$contact = DB::table('contacts')->where('your_name', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(5);
    	return view('admin.contact.list', compact('contact', 'seach'));
	}
    
    /**
    *	Delete contact was chosen
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
				]);
				
			if($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			} else {
				foreach ($request->items as $val) {
					$contact = Contact::findOrFail($val);
					$contact->delete();
				}
		
				$success['success'] = 'Bạn đã xóa thành công contact';
				return redirect('admin/contact/list/' . $seach)->with($success);
			}
		}	else {
			return redirect('admin/contact/list/' . $seach);
		}
	}
	
	/**
	* 	Display detail contact pages
	*/
	public function read($id) {
		$c = Contact::findOrFail($id);
		$c->seen = 'yes';
		$c->save();
		$contact = DB::table('contacts')->where('id', $id)->first();
		return view('admin.contact.read', compact('contact'));
	}
}