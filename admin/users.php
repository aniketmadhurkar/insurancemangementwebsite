<?php include "header.php";?>

<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- latest news area start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Users</h4>

                </div>
                <div class="card-body">

                    <div class="">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dtable">
                                <thead class="text-uppercase bg-dark text-white">
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">contact No</th>
                                        <th scope="col">State</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Pincode</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT customers.*,state_name,city_name  FROM  customers
inner join states on customers.state_id=states.state_id
    inner join cities on customers.city_id=cities.city_id WHERE 1 ";
$records = mysqli_query($con, $sql);
$data = array();
$i = 0;
while ($row = mysqli_fetch_assoc($records)) {
    $i++;

    echo '<tr>
        <td>' . $i . '</td>
        <td>' . $row["last_name"] . " " . $row["first_name"] . '</td>
        <td>' . $row["gender"] . '</td>
        <td>' . $row["email_id"] . '</td>
        <td>' . $row["contact_no"] . '</td>
        <td>' . $row["state_name"] . '</td>
        <td>' . $row["city_name"] . '</td>
        <td>' . $row["pincode"] . '</td>
    <td>
    <a href="customerdetail.php?id=' . $row["customer_id"] . '" id="btnView" class="btn btn-sm btn-outline-primary" value="View Detail"
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