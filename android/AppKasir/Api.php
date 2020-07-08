<?php 
 
	//database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'db_kasir');
	
	//connecting to database and getting the connection object
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	
	//creating a query
	$stmt = $conn->prepare("SELECT id, nama, detail, nilai, harga, gbr FROM tb_barang;");
	 if(!$stmt){
       echo "Prepare failed: (". $conn->errno.") ".$conn->error."<br>";
    }
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($id, $nama, $detail, $nilai, $harga, $gbr);
	
	$products = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['id'] = $id; 
		$temp['nama'] = $nama; 
		$temp['detail'] = $detail; 
		$temp['nilai'] = $nilai; 
		$temp['harga'] = $harga; 
		$temp['gbr'] = $gbr; 
		array_push($products, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($products);