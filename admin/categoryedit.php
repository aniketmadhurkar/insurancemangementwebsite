<?php include "header.php";?>

<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];
   $single_sql = "select category_id,category_name from categories where category_id=" . $id;
   $single_result = mysqli_query($con, $single_sql);
   $single_row = mysqli_fetch_assoc($single_result);
   $title = $single_row['category_name'] ;

if(isset($_POST['thisform'])){

$id = $_POST['id'];
$title=$_POST['title'];
$sql = "update categories set category_name='$title' where category_id=".$id;

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



<!-- page title area end -->
<div class="main-content-inner">

    <div class="row mt-5">
        <!-- form start -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary  d-flex">
                    <h4 class="header-title  text-white">Update Category</h4>
                    <div class=" ml-auto">
                        <a href="category.php" id="btnAdd" class="btn btn-outline-info  text-white" value="Add">View All
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form method="post" action=""  id="norm_form">
                        <input type="hidden" name="thisform" value="1">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <div class="form-group">
                            <label for="title">Category Name</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Category Name" value="<?php echo $title;?>">                           
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
            title: 'required',
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