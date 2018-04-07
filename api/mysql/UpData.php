<?php
	include '../config/config.php';
	class UpData {
		function updataCustomerData($name, $mobilephone, $sex, $babybirthday, $babysex, $address,$score,$shopno,$id){
			// 创建连接
			$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
			// 检测连接
			if ($conn->connect_error) {
			    die("连接失败: " . $conn->connect_error);
			} 
			$sql = "UPDATE customer SET name='".$name."',mobilephone='".$mobilephone."',sex='".$sex."',babybirthday='".$babybirthday."',babysex='".$babysex."',address='".$address."',score='".$score."',shopno=".$shopno." WHERE id=".$id;
			if ($conn->query($sql) === TRUE) {
			    echo "success";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			$conn->close();
		}
	}
?>