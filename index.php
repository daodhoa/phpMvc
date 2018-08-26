<?php
/*
	include "Model/DBConnection.php";

	$db = new DBConnection();
	$db->connect();

	$db->deleteAdmin(4);

	$result = $db->getAllAdmin();
	echo '<pre>';
	print_r($result);
	echo '</pre>';
*/

	//ket noi DB
	include "Model/DBConnection.php";

	$db = new DBConnection();
	$db->connect();

	// thiet lap controller
	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
	}else{
		$controller = "";
	}

	switch ($controller) {
		case 'admin': //admin
			require_once 'Controller/admin/AdminController.php';
			break;
		
		default: // home
			require_once 'Controller/HomeController.php';
			break;
	}

?>