<?php 
if(isset($_POST['file'])){
    $file = '../../../../upload/images/' . $_POST['file'];
    if(file_exists($file)){
        $status = unlink($file);
    }
}
?>