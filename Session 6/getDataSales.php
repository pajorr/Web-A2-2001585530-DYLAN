<?php
	include "connect.php";

	$id = $_GET["id"];
	$sql = "SELECT * FROM sales WHERE salesId=".$id;
	$data = mysqli_query($con, $sql);

	$res = array();
	$counter = 0;

    while($rs=mysqli_fetch_array($data)){
		$res[$counter]["salesId"] = $rs["salesId"];
		$res[$counter]["salesDate"] = $rs["salesDate"];
		$res[$counter]["productId"] = $rs["productId"];
		$res[$counter]["salesQuantity"] = $rs["salesQuantity"];
    	$res[$counter]["salesPrice"] = $rs["salesPrice"];
    	$counter++;
    }

    $res["size"] = $counter;
    echo json_encode($res);
?>
