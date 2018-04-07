<?php
	include '../mysql/UpData.php';
	//$postData = $GLOBALS['HTTP_RAW_POST_DATA'];
	$postData = json_decode($GLOBALS['HTTP_RAW_POST_DATA']);
	$upData = new UpData;
	$name = $postData->name;
	$mobilephone =  $postData->mobilephone;
	$sex = $postData->sex;
	$babybirthday = $postData->babybirthday;
	$babysex = $postData->babysex;
	$address = $postData->address;
	$score = $postData->score;
	$shopno = $postData->shopno;
	$id = $postData->id;
	$upData->updataCustomerData($name, $mobilephone, $sex, $babybirthday, $babysex, $address,$score,$shopno,$id); 
	//echo "add";
?>