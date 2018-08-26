<?php
	include "Model/DBConnection.php";

	$db = new DBConnection();
	$db->connect();

	$db->insertAdmin('h0aday_ndkk','h0aday_nd', 'Đào D Hòa');

	$result = $db->getAllAdmin();
	echo '<pre>';
	print_r($result);
	echo '</pre>';


?>