<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Thongtindathang;
use Validator;

class OrderController extends Controller
{
    /**
    *    Show list order page
    */
    public function getOrderNew($seach = '') {
    	$new = Thongtindathang::select('id', 'email', 'hovatendem', 'ten', 'diachi', 'dienthoai', 'tinhtrang','created_at')->where('ten', 'LIKE', '%' . $seach . '%')->orderBy('id', 'DESC')->paginate(5);
    	return view('admin.order.new', compact('new', 'seach'));
    }
    
    /**
    *   Delete order chosen 
    */
    public function postOrderNew(Request $request) {
    	$seach = (isset($request->txtSeach)) ? $request->txtSeach : '';
    	if (isset($request->apply)) {
    		$validator = Validator::make($request->all(), [
    				'selectDelete' 		=> 'required',
    				'items'				=> 'required'
    		      ],
    			  [
					'selectDelete.required' => 'Bạn chưa chọn delete!',
					'items.required' 		=> 'Bạn chưa chọn đơn hàng cần xóa!'
    			  ]);
    			
    		if($validator->fails()) {
    			return redirect()->back()->withErrors($validator->errors());
    		} else {
    			foreach ($request->items as $val) {
    				$new = Thongtindathang::findOrFail($val);
    				$new->delete();
    			}
    	
    			$success['success'] = 'Bạn đã xóa thành công đơn hàng';
    			return redirect('admin/order/order-new/' . $seach)->with($success);
    		}
    	}	else {
    		return redirect('admin/order/order-new/' . $seach);
    	}
    }
    
    /**
    *   Display detail order page
    */
    public function orderRead($id) {
        $order = Thongtindathang::find($id);
        return view('admin.order.read', compact('order'));
    }

    /**
    *   If order delivered. Change status of this one 
    */
    public function update() {
    	$order = Thongtindathang::find($_GET['id']);
    	$order->tinhtrang = $_GET['tinhtrang'];
    	$order->save();
    	echo 'ok';
    }
    
    
}
