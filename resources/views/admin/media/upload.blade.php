<?php 
	$upload = DB::table('uploads')->orderBy('id', 'DESC')->get();
	echo json_encode($upload);
?>