<?php 
     include("../config.php"); 
	 $con = mysqli_connect(db_host, db_user, db_password, db_name);
	 if (mysqli_connect_errno()) {
		 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 }

	$username = trim($_REQUEST['email']);
	$password = trim($_REQUEST['password']);

    $sql = "SELECT `admin_id`, `admin_name` FROM `admins` where username='$username' and password='$password'";
	$res = mysqli_query($con,$sql);
	
	$result = array();
	
	if(mysqli_num_rows($res) > 0){
	
		session_start();
		while($row = mysqli_fetch_array($res)){
			$_SESSION['admin_id'] = $row['admin_id'];
			$_SESSION['first_name'] = $row['admin_name'];
			$_SESSION['type'] = "admin";
			header('Location: index.php'); 
		}
	
	}
	else{
		array_push($result,array('data'=>'not found'));
		$_SESSION['admin_id'] = "";
		$_SESSION['first_name']="";
		$_SESSION['type'] = "";
		header('Location: login.php?msg=1');
		
	}

	
    mysqli_close($con);
    
?>