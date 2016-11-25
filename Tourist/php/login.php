<?php

session_start();
header("Content-Type: text/html; charset=UTF-8");
include_once '../mysql/opDB.class.php';
$response = array("statue" => '');
$con = new opDB();

if ($_POST['id'] && $_POST['password']) {
    	
	$id = $_POST['id'];
	$password = $_POST['password'];
	

	
	
     $sql = "SELECT * FROM user WHERE ID='{$id}' && password='{$password}'";
	
	$res = $con->get_result($sql);

	
	if($row = mysqli_fetch_assoc($res)){
	  
		$response['statue'] = 1;
		$con->for_close();
		setSession($id);
		echo json_encode($response);
		exit ;
	}else{
		$response['statue'] = -2;
		$con->for_close();
		echo json_encode($response);
		exit ;
	}
}else{
	$response['statue'] = -1;
	$con->for_close();
	echo json_encode($response);
	exit ;
}
/*
 * 检查 数据安全性
 * */
//function test_input($data){
//$data = trim($data);
//$data = stripslashes($data);
//$data = htmlspecialchars($data);
//return $data;
//}
/*
 * 设置 session
 * */
function setSession($id){
	$_SESSION['id'] = $id;
	setcookie("id",$id, time()+3600);
}


?>