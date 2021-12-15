<?php include "header.php";?>

<!-- page title area end -->
<div class="main-content-inner">
<?php

if(isset($_POST['thisform'])){
    $con = mysqli_connect(db_host, db_user, db_password, db_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $customer_policy_id = $_GET['id'];
    $customer_id = $_GET['cid'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

$sql = "update customer_policies set status='$status',remark='$remark' where customer_policy_id=" . $customer_policy_id . " and customer_id=" . $customer_id;

 if ($con->query($sql) === TRUE)
 {
   echo '<div class="col-md-6"><div class="alert alert-success" role="alert">
     Successfully Updated!.
</div></div>';
 } else {
    echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
     Not Updated!.'.mysqli_error($con).'
</div></div>'; // mysqli_error($con);
 }   
 mysqli_close($con);
}
?>

    <div class="row mt-5">
        <!-- latest news area start -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Update Policy Status</h4>
                    <div class=" ml-auto">
                        <a href="pendingpolicy.php" id="btnAdd" class="btn btn-outline-info  text-white" title="View All">View All
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

    $customer_policy_id = $_GET['id'];
    $policy_id = $_GET['pid'];
    $customer_id = $_GET['cid'];
    $applied_datetime = date('Y-m-d h:i:s');

    $policy_sql = "SELECT policies.*,subcategories.subcategory_name,categories.category_name FROM policies
    inner join subcategories on policies.subcategory_id=subcategories.subcategory_id
    inner join categories on subcategories.category_id=categories.category_id WHERE  policy_id=" . $policy_id . " limit 1";
    $policy_result = mysqli_query($con, $policy_sql);
    $policy_row = mysqli_fetch_assoc($policy_result);

    echo '<div class="alert alert-primary">

    <p><b class="col-md-4">Policy Name :</b> ' . $policy_row["policy_name"] . '</p>
    <p><b class="col-md-4">Category :</b>' . $policy_row["category_name"] . '</p>
    <p><b class="col-md-4">SubCategory :</b>' . $policy_row["subcategory_name"] . '</p>
    <p><b class="col-md-4">Sum Assured :</b>' . $policy_row["sum_assured"] . '</p>
    <p><b class="col-md-4">Premium :</b>' . $policy_row["premium"] . '</p>
    <p><b class="col-md-4">Tenure :</b>' . $policy_row["tenure"] . '</p>
  </div>';

    $single_sql = "SELECT `customer_policy_id`, `customer_id`, `policy_id`, `status`, `remark` FROM `customer_policies` WHERE customer_policy_id=" . $customer_policy_id . " and customer_id=" . $customer_id;
    $single_result = mysqli_query($con, $single_sql);
    $single_row = mysqli_fetch_assoc($single_result);
    if (mysqli_num_rows($single_result) > 0) {
        $status = $single_row['status'];
        $remark = $single_row['remark'];
    } else {
        $status = '';
        $remark = '';
    }

    mysqli_close($con);
}
?>
 <form method="post" action="" id="norm_form">
                        <input type="hidden" name="thisform" value="1">
                 
                        <div class="form-group">
                            <label for="title">Status</label>
                            <select type="text" class="form-control" id="status" name="status">
                            <option value="Pending" <?php if($status=="Pending"){echo 'selected';}?>>Pending</option>
                            <option value="Approved"  <?php if($status=="Approved"){echo 'selected';}?>>Approved</option>
                            <option value="Rejected"  <?php if($status=="Rejected"){echo 'selected';}?>>Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Remark</label>
                            <textarea type="text" name="remark" id="remark" placeholder="Remark"  class="form-control"><?php echo $remark;?></textarea>
                           
                        </div>

                        <button name="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- latest news area end -->

    </div>
    <!-- row area start-->
</div>

<?php include "footer.php";?>