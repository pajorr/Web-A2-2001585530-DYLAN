<?php 
	include "connect.php";
	$sql = "SELECT * FROM brand";
	$data = mysqli_query($con, $sql);

	$res = array();
	$counter = 0;

    while($rs=mysqli_fetch_array($data)){
    	$res[$counter]["brandId"] = $rs["brandId"];
    	$res[$counter]["brandName"] = $rs["brandName"];
    	$counter++;
    }

    $res["size"] = $counter;
    echo json_encode($res);
?>