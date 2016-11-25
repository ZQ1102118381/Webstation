<?php

session_start();
header("Content-Type: text/html; charset=UTF-8");
include_once '../mysql/opDB.class.php';
    $response = array("statue" => '');
    $con = new opDB();
         
		   $sql = "SELECT * FROM text";
		   $res = $con->get_result($sql);
		   echo json_encode($con->deal_result($res));
		   exit;
			

?>