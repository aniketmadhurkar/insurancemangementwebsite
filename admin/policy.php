<?php include "header.php";?>

<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- latest news area start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Policies</h4>
                    <div class=" ml-auto">
                        <a href="policyadd.php" id="btnAdd" class="btn btn-outline-info  text-white" value="Add">Add
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dtable">
                                <thead class="text-uppercase bg-dark text-white">
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">SubCategory</th>
                                        <th scope="col">Sum Assured</th>
                                        <th scope="col">Premium</th>
                                        <th scope="col">Tenure</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT policies.*,subcategories.subcategory_name,categories.category_name FROM policies
inner join subcategories on policies.subcategory_id=subcategories.subcategory_id
inner join categories on subcategories.category_id=categories.category_id WHERE 1" ;
$records = mysqli_query($con, $sql);
$data = array();
$i=0;
while ($row = mysqli_fetch_assoc($records)) {
$i++;

        echo '<tr>
        <td>' . $i . '</td> 
        <td>' . $row["policy_name"] . '</td> 
        <td>' . $row["category_name"] . '</td> 
        <td>' . $row["subcategory_name"] . '</td> 
        <td>' . $row["sum_assured"] . '</td> 
        <td>' . $row["premium"] . '</td> 
        <td>' . $row["tenure"] . '</td> 
    <td><a href="policyedit.php?id=' . $row["policy_id"] . '" id="btnEdit" class="btn btn-sm btn-outline-primary" value="Edit" 
    ><i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;
    <a href="policydelete.php?id=' . $row["policy_id"] . '" id="btnDelete"   class="btn btn-sm btn-outline-danger" value="Delete"   ><i class="ti-trash"></i></a></td>
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