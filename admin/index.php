<?php include("header.php"); ?>

<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$category_sql = "select count(category_id) as category_count from categories where 1";
$category_result = mysqli_query($con, $category_sql);
$category_row = mysqli_fetch_assoc($category_result);
$category_count = $category_row['category_count'] ;


$subcategory_sql = "select count(subcategory_id) as subcategory_count from subcategories where 1";
$subcategory_result = mysqli_query($con, $subcategory_sql);
$subcategory_row = mysqli_fetch_assoc($subcategory_result);
$subcategory_count = $subcategory_row['subcategory_count'] ;

$policy_sql = "select count(policy_id) as policy_count from policies where 1";
$policy_result = mysqli_query($con, $policy_sql);
$policy_row = mysqli_fetch_assoc($policy_result);
$policy_count = $policy_row['policy_count'] ;

$customer_sql = "select count(customer_id) as customer_count from customers where 1";
$customer_result = mysqli_query($con, $customer_sql);
$customer_row = mysqli_fetch_assoc($customer_result);
$customer_count = $customer_row['customer_count'] ;

$pending_sql = "select count(customer_policy_id) as pending_count from customer_policies where status='Pending'";
$pending_result = mysqli_query($con, $pending_sql);
$pending_row = mysqli_fetch_assoc($pending_result);
$pending_count = $pending_row['pending_count'] ;

$approved_sql = "select count(customer_policy_id) as approved_count from customer_policies where status='Approved'";
$approved_result = mysqli_query($con, $approved_sql);
$approved_row = mysqli_fetch_assoc($approved_result);
$approved_count = $approved_row['approved_count'] ;

$rejected_sql = "select count(customer_policy_id) as rejected_count from customer_policies where status='Rejected'";
$rejected_result = mysqli_query($con, $rejected_sql);
$rejected_row = mysqli_fetch_assoc($rejected_result);
$rejected_count = $rejected_row['rejected_count'] ;

?>
            <!-- page title area end -->
            <div class="main-content-inner">
 
                <div class="row mt-5">
                
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                    <a href="category.php">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Categories</div>
                                            <h2><?php echo $category_count;?></h2>
                                        </div>
                                    </a>                                                                            
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-md-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                    <a href="subcategory.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Subategories</div>
                                            <h2><?php echo $subcategory_count;?></h2>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-5 mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                    <a href="policy.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Policies</div>
                                            <h2><?php echo $policy_count;?></h2>
                                        </div>    
                                        </a>                                  
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4  mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg4">
                                    <a href="users.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Users</div>
                                            <h2><?php echo $customer_count;?></h2>
                                        </div>  
                                        </a>                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4  mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg1">
                                    <a href="pendingpolicy.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Pending Policy</div>
                                            <h2><?php echo $pending_count;?></h2>
                                        </div>  
                                        </a>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4  mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg2">
                                    <a href="approvedpolicy.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Approved Policy</div>
                                            <h2><?php echo $approved_count;?></h2>
                                        </div>  
                                        </a>                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4  mb-3">
                                <div class="card">
                                    <div class="seo-fact sbg3">
                                    <a href="rejectedpolicy.php">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-bar-chart-alt"></i> Rejected Policy</div>
                                            <h2><?php echo $rejected_count;?></h2>
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