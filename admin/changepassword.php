<?php include "header.php";?>

<?php

if (isset($_POST['thisform'])) {
    $con = mysqli_connect(db_host, db_user, db_password, db_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $admin_id = $_SESSION['admin_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $single_sql = "SELECT admin_id from admins WHERE admin_id=$admin_id  and password='$old_password'";
    $single_result = mysqli_query($con, $single_sql);
    $single_row = mysqli_fetch_assoc($single_result);
    if (mysqli_num_rows($single_result) > 0) {

        $sql = "update admins  set password ='$new_password' where admin_id=$admin_id and password='$old_password'";

        if ($con->query($sql) === true) {
            echo '<div class="col-md-6"><div class="alert alert-success" role="alert">
     Successfully Added!.
</div></div>';
        } else {
            echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
     Not Added!.' . mysqli_error($con) . '
</div></div>'; // mysqli_error($con);
        }
    } else {
        echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
     Password did not match!</div></div>';
    }
    mysqli_close($con);
}
?>



<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- form start -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Change Pasword</h4>

                </div>
                <div class="card-body">

                    <form method="post" action="" id="norm_form">
                        <input type="hidden" name="thisform" value="1">
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password">
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- form end -->


    </div>
    <!-- row area start-->
</div>
<script>
$(document).ready(function() {
jQuery("#norm_form").validate({
        rules: {
            old_password: 'required',
            new_password: 'required',
            confirm_password:{
            equalTo: "#new_password",
        }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
<?php include "footer.php";?>