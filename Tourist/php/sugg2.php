<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
   include_once '../mysql/opDB.class.php';
   $response = array("statue" => '');
   $con = new opDB();
   
if(isset($_SESSION['id']) && $_SESSION['id']){
	    $id =  $_SESSION['id'];
	    $title = $_POST['title'];
		$conn = $_POST['con'];

			
	     $sql="INSERT INTO text(ID,Title,Content) VALUES ('{$id}','{$title}','{$conn}')";
		 $res = $con->excute_dml($sql);
		  
		   if($res == 1){
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
   
   }else{
			$response['statue'] = -3;
			$con->for_close();
			echo json_encode($response);
			exit ;
	  }


?>