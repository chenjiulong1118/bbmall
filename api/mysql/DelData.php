<?php
	include '../config/config.php';
class DelData{
	
	function delCustomerData($id){
		// 创建连接
		$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
		if (!$conn) {
		    die("连接失败: " . mysqli_connect_error());
		}
		$sql = "DELETE FROM customer WHERE id=".$id;
		if ($conn->query($sql) === TRUE) {
		    echo "success";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		 
		mysqli_close($conn);
	}
	
}

 

?>