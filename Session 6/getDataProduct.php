<?php
	include "connect.php";

	$id = $_GET["id"];
	$sql = "SELECT * FROM product WHERE modelId=".$id;
	$data = mysqli_query($con, $sql);

	$res = array();
	$counter = 0;

    while($rs=mysqli_fetch_array($data)){
		$res[$counter]["productId"] = $rs["productId"];
		$res[$counter]["productName"] = $rs["productName"];
		$res[$counter]["productStock"] = $rs["productStock"];
		$res[$counter]["productPrice"] = $rs["productPrice"];
    	$res[$counter]["modelId"] = $rs["modelId"];
    	$counter++;
    }

    $res["size"] = $counter;
    echo json_encode($res);
?>
