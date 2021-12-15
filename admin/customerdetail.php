<?php include "header.php";?>

<!-- page title area end -->
<div class="main-content-inner">


    <div class="col-md-6">
        <!-- latest news area start -->
        <?php

if (isset($_GET['id'])) { ?>
                <div class="card-body ">

                <?php
    $con = mysqli_connect(db_host, db_user, db_password, db_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $customer_id = $_GET['id'];

    $customer_sql = "SELECT customers.*,state_name,city_name  FROM  customers
    inner join states on customers.state_id=states.state_id
        inner join cities on customers.city_id=cities.city_id 
    WHERE  customer_id=" . $customer_id . " limit 1";
    $customer_result = mysqli_query($con, $customer_sql);
    $customer_row = mysqli_fetch_assoc($customer_result);

?>
                <div class="card mt-5">
        <div class="card-header bg-primary  ">
                    <h4 class="header-title  text-white">Customer Detail</h4>
                </div>
        <div class="card-body ">
        <?php
         echo '<div class="alert alert-primary">
         <p><b class="col-md-4">User Name :</b> ' . $customer_row["last_name"] ." ".$customer_row["first_name"] . '</p>
         <p><b class="col-md-4">Gender :</b> ' . $customer_row["gender"] . '</p>
         <p><b class="col-md-4">Email :</b> ' . $customer_row["email_id"] . '</p>
         <p><b class="col-md-4">Contact No :</b> ' . $customer_row["contact_no"] . '</p>
         <p><b class="col-md-4">State :</b> ' . $customer_row["state_name"] . '</p>
         <p><b class="col-md-4">City :</b> ' . $customer_row["city_name"] . '</p>
         <p><b class="col-md-4">Address :</b> ' . $customer_row["address"] . '</p>
         <p><b class="col-md-4">Pincode :</b> ' . $customer_row["pincode"] . '</p>
         </div>';
         mysqli_close($con);   
}
        ?>
        </div>

      
        <!-- latest news area end -->
        </div>
        </div>
    </div>
    <!-- row area start-->
</div>

<?php include "footer.php";?>