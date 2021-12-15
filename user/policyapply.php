<?php include "header.php";?>

<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- latest news area start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Apply for Policy</h4>
                    <div class=" ml-auto">
                        <a href="policy.php" id="btnAdd" class="btn btn-outline-info  text-white" value="Add">View All
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

    $policy_id = $_GET['id'];
    $customer_id=$_SESSION['customer_id'];
    $applied_datetime=date('Y-m-d h:i:s');


    $policy_sql = "SELECT policies.*,subcategories.subcategory_name,categories.category_name FROM policies
    inner join subcategories on policies.subcategory_id=subcategories.subcategory_id
    inner join categories on subcategories.category_id=categories.category_id WHERE  policy_id=".$policy_id ." limit 1";
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



    $single_sql = "SELECT `customer_policy_id`, `customer_id`, `policy_id`, `status` FROM `customer_policies` WHERE policy_id=" . $policy_id." and customer_id=".$customer_id;
    $single_result = mysqli_query($con, $single_sql);
    $single_row = mysqli_fetch_assoc($single_result);
    if(mysqli_num_rows($single_result)>0) {
        echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
        You already applied for this policy !.</div></div>'; 
    }
    else{
        $sql = "INSERT INTO `customer_policies`( `customer_id`, `policy_id`, `status`,`applied_date`) 
        VALUES ('$customer_id','$policy_id','Pending','$applied_datetime')";
           
        if ($con->query($sql) === true) {
            echo '<div class="col-md-6"><div class="alert alert-success" role="alert">
         Successfully Applied to this Policy !.
    </div></div>';
        } else {
            echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
         Not Deleted!.'.mysqli_error($con).'
    </div></div>'; // 
        }
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