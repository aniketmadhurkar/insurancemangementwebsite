<?php include "../config.php";?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User Registration </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <!-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"  media="all" />
        -->
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
        <!-- jquery latest version -->
        <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="../assets/js/jquery.validate.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--70">
                <form method="post" action="getLogin.php" class="" id="norm_form">
                    <div class="login-form-head">
                        <h4>Registration</h4>
                    </div>
                    <div class="login-form-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="First Name"  value="">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name"  value="">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" checked="" id="male" name="gender" class="custom-control-input" value="Male">
                                                <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" checked="" id="female" name="gender" class="custom-control-input" value="Female">
                                                <label class="custom-control-label" for="female">Female</label>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">State</label>
                            <select type="text" name="state" id="state" class="form-control">
                            <?php  $con = mysqli_connect(db_host, db_user, db_password, db_name);
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
$sql2 = "select state_id,state_name from states  ";
$result2 = mysqli_query($con, $sql2);
$data = array();
while ($row = mysqli_fetch_assoc($result2)) {
?>

                                    <?php 
                                    echo '<option value="'.$row['state_id'].'" '.$selected. '>'.$row['state_name'].'</option>';?>


                                    <?php }?>   
                            </select>
                            
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <select type="text" name="city" id="city" class="form-control">
                            </select>
                            
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea type="text" name="address" id="address" placeholder="Address"  class="form-control"></textarea>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Pincode</label>
                            <input type="text" name="pincode" id="pincode" placeholder="Pincode" value="">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Mobile No.</label>
                            <input type="text" name="mobile" id="mobile" placeholder="Mobile No." value="">
                            <i class="ti-mobile"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" value="">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password"  value="">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>

                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>

                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Already have an account? <a href="login.php">Sign in</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
<script>
$(document).ready(function() {
jQuery("#norm_form").validate({

        rules: {
            username: 'required',
            mobile: 'required',
            email: 'required',
            password: 'required',
            gender: 'required',
            state: 'required',
            city: 'required',
            address: 'required',
            pincode: 'required',
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

    
    $(document).on('change', '#state', function() {
        var cid = $(this).find(":selected").val();
        getcities(cid);
    });

    function getcities(cid) {
        $.getJSON("getcities.php?id=" + cid, function(data) {
            $("#city").empty();
            $("#city").append("<option value=''>Select </option>");
            $.each(data, function(key, val) {
                $("#city").append("<option value='" + val.id + "'>" + val.name +
                    "</option>");
            });
        });
    }
});
</script>

    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>