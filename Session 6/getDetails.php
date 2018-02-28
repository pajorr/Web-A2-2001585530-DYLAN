<?php
	include "connect.php";
	$id = $_GET["id"];
	$sql = "SELECT * FROM product WHERE productId =".$id;
	$data = mysqli_query($con, $sql);

	$res = array();
	$counter = 0;

	while($rs=mysqli_fetch_array($data)){
		if(key($rs) == "productPrice"){
			echo $rs["productPrice"];
			die;
		}
	}
?>