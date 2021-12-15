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


            <?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['thisform'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['contact_no'];
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $state_id = $_POST['state'];
    $city_id = $_POST['city'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];

    $sql = "INSERT INTO `customers`( `first_name`, `last_name`, `gender`, `contact_no`, `email_id`, `password`, `state_id`, `city_id`, `address`, `pincode`)
VALUES ('$first_name','$last_name','$gender','$contact_no','$email_id','$password','$state_id','$city_id','$address','$pincode')";

    if ($con->query($sql) === true) {
        echo '<div class=""><div class="alert alert-success" role="alert">
     Successfully Registered! <a href="login.php">Login Now</a>
</div></div>';
    } else {
        echo '<div class=""><div class="alert alert-danger" role="alert">
     Problem Occured Please try again!.' . mysqli_error($con) . '
</div></div>'; // mysqli_error($con);
    }
    mysqli_close($con);
}
?>



                <form method="post" action="" class="" id="norm_form">
                <input type="hidden" name="thisform" value="1">
                    <div class="login-form-head">
                        <h4>Registration</h4>
                    </div>
                    <div class="login-form-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="First Name"  value=""   class="form-control">
                       
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name"  value=""   class="form-control">
                       
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
                            <select name="state" id="state" class="form-control">
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
                            <select  name="city" id="city" class="form-control">
                            </select>
                            
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea type="text" name="address" id="address" placeholder="Address"  class="form-control"></textarea>
                           
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Pincode</label>
                            <input type="text" name="pincode" id="pincode" placeholder="Pincode" value=""   class="form-control">
                        
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Mobile No.</label>
                            <input type="text" name="contact_no" id="contact_no" placeholder="Mobile No." value=""   class="form-control">
                         
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Email(Username)</label>
                            <input type="email" name="email_id" id="email_id" placeholder="Email" value=""   class="form-control">
                          
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password"  value=""   class="form-control">
                         
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
            first_name: 'required',
            last_name: 'required',
            contact_no: 'required',
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
    $(document).on("change", '#email_id', function() {
        if ($("#email_id").val().length > 0) {
            isEmailExist($("#email_id").val());
        }

    });

    function isEmailExist(email) {

        $.ajax({
            url: 'isEmailExist.php',
            type: 'post',
            data: {
                email: email
            },
            dataType: 'json',
            success: function(response) {
                if (response.code == 1) {
                    alert("Email Id already Exist!");
                    $("#email_id").val("");
                } else {}
            }
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