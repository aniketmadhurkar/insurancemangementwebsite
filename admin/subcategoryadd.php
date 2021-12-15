<?php include "header.php";?>

<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['thisform'])){

$category=$_POST['category'];
$title=$_POST['title'];
$sql = "INSERT INTO subcategories(category_id, subcategory_name)
VALUES ('$category','$title')";

 if ($con->query($sql) === TRUE)
 {
   echo '<div class="col-md-6"><div class="alert alert-success" role="alert">
     Successfully Added!.
</div></div>';
 } else {
    echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
     Not Added!.'.mysqli_error($con).'
</div></div>'; // mysqli_error($con);
 }   
 mysqli_close($con);
}
?>



<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- form start -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Add New Sub Category</h4>
                    <div class=" ml-auto">
                        <a href="subcategory.php" id="btnAdd" class="btn btn-outline-info  text-white" value="Add">View All
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form method="post" action="">
                        <input type="hidden" name="thisform" value="1">
                        <div class="form-group">
                            <label for="title">Category </label>
                            <select id="category" name="category" class="form-control">
                                <option value="">Select Category</option>
                            <?php   
                            $con = mysqli_connect(db_host, db_user, db_password, db_name);
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
$sql2 = "select category_id,category_name from categories where 1 ";
$result2 = mysqli_query($con, $sql2);
$data = array();
while ($row = mysqli_fetch_assoc($result2)) {
?>

                                    <?php echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';?>


                                    <?php }?>   
</select>                     
                        </div>
                        <div class="form-group">
                            <label for="title">Sub Category Name</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Sub Category Name">                           
                        </div>
                       
                       
                        <button name="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- form end -->

        
    </div>
    <!-- row area start-->
</div>

<?php include "footer.php";?>