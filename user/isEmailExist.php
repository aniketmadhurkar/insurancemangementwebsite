<?php include "../config.php";?>
<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql2 = "select customer_id from customers where email_id='".$_POST['email']."'";
$result2 = mysqli_query($con, $sql2);
$response = array();
if(mysqli_num_rows($result2)>0) {
    $response['code']=1;
}
else{
    $response['code']=0;
}
mysqli_close($con);
echo json_encode($response);
?>