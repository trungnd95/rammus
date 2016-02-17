<?php
namespace App\Libs\Html;

class HtmlCategory {
	
	//************************************************//
	/* $data = array();
	 	$data = array(
						[0] => array(
									'id' => 5,
									'name' => 'option'
								)
					);
	*/
	//************************************************//
	public function create_select_category($data, $parent = 0, $str = '', $select = 0, $echo = false) {
		$html = '';
		foreach ($data as $val) {
			$id 	= $val['id'];
			$name 	= $val['name'];			
			
			if($val['parent_id'] == $parent) {
				if ($select != 0 && $id == $select) {
					$html .= "<option value='$id' selected='selected'>$str $name</option>";
				} else {
					$html .= "<option value='$id'>$str $name</option>";
				}
				$html .= $this->create_select_category($data, $id, $str . '-', $select, false);
			}
		}
		
		if($echo == false) {
			return $html;
		} else echo $html;
	}
}