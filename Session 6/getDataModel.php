<?php
	include "connect.php";

	$id = $_GET["id"];
	$sql = "SELECT * FROM model WHERE brandId=".$id;
	$data = mysqli_query($con, $sql);

	$res = array();
	$counter = 0;

    while($rs=mysqli_fetch_array($data)){
		$res[$counter]["modelId"] = $rs["modelId"];
		$res[$counter]["modelName"] = $rs["modelName"];
    	$res[$counter]["brandId"] = $rs["brandId"];
    	$counter++;
    }

    $res["size"] = $counter;
    echo json_encode($res);
?>
