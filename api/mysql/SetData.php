<?php
	include '../config/config.php';
	class SetData {
		function getCustomerData($name, $mobilephone, $sex, $babybirthday, $babysex, $address,$score,$shopno){
			// 创建连接
			$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
			// 检测连接
			if ($conn->connect_error) {
			    die("连接失败: " . $conn->connect_error);
			} 
			
			$sql = "INSERT INTO customer (name, mobilephone, sex, babybirthday, babysex, address, score, shopno)
			VALUES ('". $name."','".$mobilephone."','".$sex."','". $babybirthday."','". $babysex ."','". $address."','". $score."',". $shopno.")";
			
			if ($conn->query($sql) === TRUE) {
			    echo "success";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$conn->close();
		}
	}
?>