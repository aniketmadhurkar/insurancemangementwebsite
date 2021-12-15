<?php include "header.php";?>

<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- latest news area start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">SubCategory</h4>
                    <div class=" ml-auto">
                        <a href="category.php" id="btnAdd" class="btn btn-outline-info  text-white" value="Add">View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                <?php

if (isset($_GET['id'])) {
    $con = mysqli_connect(db_host, db_user, db_password, db_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $id = $_GET['id'];
    $sql = "DELETE FROM subcategories WHERE subcategory_id=".$id;
	$res = mysqli_query($con,$sql);

    if ($con->query($sql) === true) {
        echo '<div class="col-md-6"><div class="alert alert-success" role="alert">
     Successfully Deleted!.
</div></div>';
    } else {
        echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
     Not Deleted!.'.mysqli_error($con).'
</div></div>'; // 
    }
    mysqli_close($con);
}
?>

                </div>
            </div>
        </div>
        <!-- latest news area end -->

    </div>
    <!-- row area start-->
</div>

<?php include "footer.php";?>