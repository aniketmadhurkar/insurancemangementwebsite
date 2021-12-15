<?php include("header.php"); ?>

<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$customer_id=$_SESSION['customer_id'];
$pending_sql = "select count(customer_policy_id) as pending_count from customer_policies where status='Pending' and customer_id=".$customer_id;
$pending_result = mysqli_query($con, $pending_sql);
$pending_row = mysqli_fetch_assoc($pending_result);
$pending_count = $pending_row['pending_count'] ;

$approved_sql = "select count(customer_policy_id) as approved_count from customer_policies where status='Approved' and customer_id=".$customer_id;
$approved_result = mysqli_query($con, $approved_sql);
$approved_row = mysqli_fetch_assoc($approved_result);
$approved_count = $approved_row['approved_count'] ;

$rejected_sql = "select count(customer_policy_id) as rejected_count from customer_policies where status='Rejected' and customer_id=".$customer_id;
$rejected_result = mysqli_query($con, $rejected_sql);
$rejected_row = mysqli_fetch_assoc($rejected_result);
$rejected_count = $rejected_row['rejected_count'] ;


?>
            <!-- page title area end -->
            <div class="main-content-inner">
 
                <div class="row mt-5">
                
                    <div class="col-md-12">
                        <div class="row">

                        
                            <div class="col-md-4  mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                    <a href="applied.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Applied Policy</div>
                                            <h2><?php echo $pending_count;?></h2>
                                        </div>  
                                        </a>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4  mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                    <a href="mypolicies.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Approved Policy</div>
                                            <h2><?php echo $approved_count;?></h2>
                                        </div>  
                                        </a>                                    
                                    </div>
                                </div>
                            </div>



                        </div>                    
                    </div>                           
                </div>
                <!-- row area start-->
            </div>
      
     
<?php include("footer.php"); ?>