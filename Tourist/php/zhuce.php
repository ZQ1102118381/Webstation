<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
   include_once '../mysql/opDB.class.php';
   $response = array("statue" => '');
   $con = new opDB();
   
   if ($_POST['id'] &&  $_POST['password']) {
	    $id = $_POST['id'];
		$pass = $_POST['password'];
		
		$sql01  = "SELECT ID FROM user WHERE ID='{$id}'";
		$res = $con->excute_dql($sql01);
		
		if($res == 1){
			$response['statue'] = -1;
			$con->for_close();
			echo json_encode($response);
			exit ;
		}else{
			
	     $sql="INSERT INTO user (ID,password) VALUES ('{$id}','{$pass}')";
		  $res1 = $con->excute_dml($sql);
		  
		   if($res1 == 1){
			$response['statue'] = 1;
			$con->for_close();
			echo json_encode($response);
			exit ;
		   }else{
			$response['statue'] = -2;
			$con->for_close();
			echo json_encode($response);
			exit ;
	  }
     }
 }else{
			$response['statue'] = -3;
			$con->for_close();
			echo json_encode($response);
			exit ;
	  }


?>