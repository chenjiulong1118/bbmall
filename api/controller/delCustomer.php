<?php
	include '../mysql/DelData.php';
	$getData = new DelData;
	$id =  $_GET["id"];
	$getData->delCustomerData($id); 
?>