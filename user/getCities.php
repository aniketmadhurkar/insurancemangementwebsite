<?php include "../config.php";?>
<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql2 = "select city_id,city_name from cities where state_id=".$_GET['id'];
$result2 = mysqli_query($con, $sql2);
$response = array();
while ($row = mysqli_fetch_assoc($result2)) {
    array_push($response,array('id'=>$row['city_id'],'name'=>$row['city_name']));
}
mysqli_close($con);
echo json_encode($response);
?>