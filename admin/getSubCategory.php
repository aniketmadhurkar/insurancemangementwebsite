<?php include "../config.php";?>
<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql2 = "select subcategory_id,subcategory_name from subcategories where category_id=".$_GET['id'];
$result2 = mysqli_query($con, $sql2);
$response = array();
while ($row = mysqli_fetch_assoc($result2)) {
    array_push($response,array('id'=>$row['subcategory_id'],'name'=>$row['subcategory_name']));
}
mysqli_close($con);
echo json_encode($response);
?>