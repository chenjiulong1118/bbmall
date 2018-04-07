<?php
	include '../config/config.php';
class GetData{
	
	function getCustomerData($shopno){
		// 创建连接
		$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
		if (!$conn) {
		    die("连接失败: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM customer where shopno=".$shopno;
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		    // 输出数据
		    $i = 0;
		    while($row = mysqli_fetch_assoc($result)) {
		    	$data['id'] = $row["id"];
				$data['name'] = $row["name"]; 
				$data['mobilephone'] = $row["mobilephone"]; 
				$data['sex'] = $row["sex"]; 
				$data['babybirthday'] = $row["babybirthday"];
				$data['babysex'] = $row["babysex"];
				$data['address'] = $row["address"];
				$data["score"] = $row["score"];
				$data["shopno"] = $row["shopno"];
				$arr[$i] = $data;
				$i++;
		    };
		   echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		} else {
		    echo "0 结果";
		}
		 
		mysqli_close($conn);
	}
	
}

 

?>