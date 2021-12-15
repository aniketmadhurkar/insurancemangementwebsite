<?php 
    include("../config.php"); 
	$con = mysqli_connect(db_host, db_user, db_password, db_name);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$email = trim($_REQUEST['email']);
	$password = trim($_REQUEST['password']);

    $sql = "SELECT `customer_id`, `first_name` FROM `customers` where email_id='$email' and password='$password'";
	$res = mysqli_query($con,$sql);
	print_r($con);
	$result = array();
	
	if(mysqli_num_rows($res) > 0){
	
		session_start();
		while($row = mysqli_fetch_array($res)){
			$_SESSION['customer_id'] = $row['customer_id'];
			$_SESSION['first_name'] = $row['first_name'];
			$_SESSION['type'] = "customer";
			header('Location: index.php'); 
		}
	
	}
	else{
		array_push($result,array('data'=>'not found'));
		$_SESSION['customer_id'] = "";
		$_SESSION['first_name']="";
		$_SESSION['type'] = "";
		header('Location: login.php?msg=1');
	}

	
    mysqli_close($con);
    
?>