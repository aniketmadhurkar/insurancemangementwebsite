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

    <div class="row ">
        <!-- latest news area start -->
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header bg-primary   ">
                    <h4 class="header-title  text-white">Policy Detail</h4>
                    <!-- <div class=" ml-auto">
                        <a href="pendingpolicy.php" id="btnAdd" class="btn btn-outline-info  text-white" title="View All">View All
                        </a>
                    </div> -->
                </div>
                <?php

if (isset($_GET['id'])) { ?>
                <div class="card-body ">

                <?php
    $con = mysqli_connect(db_host, db_user, db_password, db_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $customer_policy_id = $_GET['id'];

    $policy_sql = "SELECT policies.*,subcategories.subcategory_name,categories.category_name,customer_policies.status,customer_policies.customer_id,
    customer_policies.customer_policy_id,customers.*,state_name,city_name  FROM policies
    inner join customer_policies on policies.policy_id=customer_policies.policy_id
    inner join customers on customer_policies.customer_id=customers.customer_id
    inner join states on customers.state_id=states.state_id
    inner join cities on customers.city_id=cities.city_id
    inner join subcategories on policies.subcategory_id=subcategories.subcategory_id
    inner join categories on subcategories.category_id=categories.category_id  
    WHERE  customer_policy_id=" . $customer_policy_id . " limit 1";
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

 
   

?>
 
                </div>
                </div>
        
                <div class="card mt-5">
        <div class="card-header bg-primary  ">
                    <h4 class="header-title  text-white">Customer Detail</h4>
                </div>
        <div class="card-body ">
        <?php
         echo '<div class="alert alert-primary">
         <p><b class="col-md-4">User Name :</b> ' . $policy_row["last_name"] ." ".$policy_row["first_name"] . '</p>
         <p><b class="col-md-4">Gender :</b> ' . $policy_row["gender"] . '</p>
         <p><b class="col-md-4">Email :</b> ' . $policy_row["email_id"] . '</p>
         <p><b class="col-md-4">Contact No :</b> ' . $policy_row["contact_no"] . '</p>
         <p><b class="col-md-4">State :</b> ' . $policy_row["state_name"] . '</p>
         <p><b class="col-md-4">City :</b> ' . $policy_row["city_name"] . '</p>
         <p><b class="col-md-4">Address :</b> ' . $policy_row["address"] . '</p>
         <p><b class="col-md-4">Pincode :</b> ' . $policy_row["pincode"] . '</p>
         </div>';
        ?>
        </div>

        <?php
 mysqli_close($con);   
}
?>
        <!-- latest news area end -->
        </div>
        </div>
    </div>
    <!-- row area start-->
</div>

<?php include "footer.php";?>