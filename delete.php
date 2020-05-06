<?php
	include('db.php');
	$info = json_decode(file_get_contents("php://input"));
	$error = false;
    $message = '';
	if (count($info) > 0) {
	    $id = $info->Id;
	    if ($connect->query("DELETE from tbl_customer where Id='$id'")) {
	        $message= 'Member Deleted Successfully';
	    } else {
	        $message= 'Failed';
	        $error=true;
	    }
	    $output = array(
          'error'  => $error,
          'message' => $message
         );

        echo json_encode($output);
	}
?>