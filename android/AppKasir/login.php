<?php //database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'db_kasir');
	
	//connecting to database and getting the connection object
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	 class usr{}
	 $username = $_POST["username"];
	 $password = $_POST["password"];
	
	 if ((empty($username)) || (empty($password))) { 
	 	$response = new usr();
		$response->success = 0;
	 	$response->message = "Kolom tidak boleh kosong"; 
	 	die(json_encode($response));
	 }
	
	 $query = mysqli_query($con, "SELECT * FROM tb_login WHERE username='$username' AND password='$password'");
	
	 $row = mysqli_fetch_array($query);
	
	 if (!empty($row)){
	 	$response = new usr();
	 	$response->success = 1;
	 	$response->message = "Selamat datang ".$row['username'];
	 	$response->id = $row['id'];
	 	$response->username = $row['username'];
	 	die(json_encode($response));
		
	 } else { 
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Username atau password salah";
	 	die(json_encode($response));
	 }
	
	 mysqli_close($con);
	 ?>