<?php include "header.php";?>

<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- latest news area start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Approved Policies</h4>
                   
                </div>
                <div class="card-body">

                    <div class="">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dtable">
                                <thead class="text-uppercase bg-dark text-white">
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Contact</th>
                                        <th scope="col">Policy Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">SubCategory</th>
                                        <th scope="col">Sum Assured</th>
                                        <th scope="col">Premium</th>
                                        <th scope="col">Tenure</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT policies.*,subcategories.subcategory_name,categories.category_name,customer_policies.status,customer_policies.customer_id,
customer_policies.customer_policy_id,customers.*  FROM policies
inner join customer_policies on policies.policy_id=customer_policies.policy_id
inner join customers on customer_policies.customer_id=customers.customer_id
inner join subcategories on policies.subcategory_id=subcategories.subcategory_id
inner join categories on subcategories.category_id=categories.category_id WHERE customer_policies.status='Approved' " ;
$records = mysqli_query($con, $sql);
$data = array();
$i=0;
while ($row = mysqli_fetch_assoc($records)) {
$i++;

        echo '<tr>
        <td>' . $i . '</td> 
        <td>' . $row["last_name"] ." ".$row["first_name"]. '</td> 
        <td>' . $row["contact_no"] . '</td> 
        <td>' . $row["policy_name"] . '</td> 
        <td>' . $row["category_name"] . '</td> 
        <td>' . $row["subcategory_name"] . '</td> 
        <td>' . $row["sum_assured"] . '</td> 
        <td>' . $row["premium"] . '</td> 
        <td>' . $row["tenure"] . '</td> 
        <td>' . $row["status"] . '</td> 
    <td>
    <a href="customerpolicydetail.php?id=' . $row["customer_policy_id"] . '" id="btnView" class="btn btn-sm btn-outline-primary" value="View Detail" 
    >View Detail </a></td>
      </tr>';
    
}

?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- latest news area end -->

    </div>
    <!-- row area start-->
</div>
<script>
$(document).ready(function() {

    $('#dtable').DataTable({});
});
</script>
<?php include "footer.php";?>