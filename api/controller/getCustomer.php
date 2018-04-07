<?php
	include '../mysql/GetData.php';
	$getData = new GetData;
	$shopno =  $_GET["shopno"];
	$getData->getCustomerData($shopno); 
?>