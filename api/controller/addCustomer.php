<?php
	include '../mysql/SetData.php';
	//$postData = $GLOBALS['HTTP_RAW_POST_DATA'];
	$postData = json_decode($GLOBALS['HTTP_RAW_POST_DATA']);
	$setData = new SetData;
	$name = $postData->name;
	$mobilephone =  $postData->mobilephone;
	$sex = $postData->sex;
	$babybirthday = $postData->babybirthday;
	$babysex = $postData->babysex;
	$address = $postData->address;
	$score = $postData->score;
	$shopno = $postData->shopno;
	$setData->getCustomerData($name, $mobilephone, $sex, $babybirthday, $babysex, $address,$score,$shopno); 
	//echo "add";
?>