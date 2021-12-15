<?php include "header.php";?>

<?php
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];
   $single_sql = "SELECT policy_id, policy_name, category_id, subcategory_id, sum_assured, premium, tenure FROM policies WHERE policy_id=" . $id;
   $single_result = mysqli_query($con, $single_sql);
   $single_row = mysqli_fetch_assoc($single_result);
   $category_id = $single_row['category_id'] ;
   $subcategory_id = $single_row['subcategory_id'] ;
   $sum_assured = $single_row['sum_assured'] ;
   $premium = $single_row['premium'] ;
   $tenure = $single_row['tenure'] ;
   $title = $single_row['policy_name'] ;



if(isset($_POST['thisform'])){

    $title=$_POST['title'];
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $sum_assured=$_POST['sum_assured'];
    $premium=$_POST['premium'];
    $tenure=$_POST['tenure'];

$sql = "update policies set policy_name='$title', category_id='$category', subcategory_id='$subcategory', sum_assured='$sum_assured', premium='$premium', tenure='$tenure'
 where policy_id=".$id;

 if ($con->query($sql) === TRUE)
 {
   echo '<div class="col-md-6"><div class="alert alert-success" role="alert">
     Successfully Added!.
</div></div>';
 } else {
    echo '<div class="col-md-6"><div class="alert alert-danger" role="alert">
     Not Added!.'.mysqli_error($con).'
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
                    <h4 class="header-title  text-white">Update Policy</h4>
                    <div class=" ml-auto">
                        <a href="policy.php" id="btnAdd" class="btn btn-outline-info  text-white" value="Add">View
                            All
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form method="post" action="" id="norm_form" name="aform">
                        <input type="hidden" name="thisform" value="1">
                        <div class="form-group">
                            <label for="title">Category </label>
                            <select id="category" name="category" class="form-control" onchange="this.form.submit();">
                                <option value="">Select Category</option>
                                <?php   
                            $con = mysqli_connect(db_host, db_user, db_password, db_name);
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
$sql2 = "select category_id,category_name from categories where 1 ";
$result2 = mysqli_query($con, $sql2);
$data = array();
while ($row = mysqli_fetch_assoc($result2)) {
?>

                                <?php   if($row['category_id']==$category_id){ $selected="selected";}else{$selected='';} 
                                echo '<option value="'.$row['category_id'].'" '.$selected. '>'.$row['category_name'].'</option>';?>


                                <?php }
                                     mysqli_close($con);
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcategory"> Category Name</label>
                            <select id="subcategory" name="subcategory" class="form-control">
                            <?php   
                            $con = mysqli_connect(db_host, db_user, db_password, db_name);
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
                            $subcategory_sql="select subcategory_id,category_id,subcategory_name from subcategories where category_id=" . $category_id;
                            $subcategory_result = mysqli_query($con, $subcategory_sql);
$data = array();
while ($row = mysqli_fetch_assoc($subcategory_result)) {
?>

                                <?php   if($row['subcategory_id']==$subcategory_id){ $selected="selected";}else{$selected='';} 
                                echo '<option value="'.$row['subcategory_id'].'" '.$selected. '>'.$row['subcategory_name'].'</option>';?>


                                <?php }
                                     mysqli_close($con);
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Policy Name</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter Policy Name" value="<?php echo $title;?>">
                        </div>
                        <div class="form-group">
                            <label for="sum_assured">Sum Assured</label>
                            <input type="text" class="form-control" id="sum_assured" name="sum_assured"
                                placeholder="Enter Sum Assured" value="<?php echo $sum_assured;?>">
                        </div>
                        <div class="form-group">
                            <label for="premium">Premium</label>
                            <input type="text" class="form-control" id="premium" name="premium"
                                placeholder="Enter Premium" value="<?php echo $premium;?>">
                        </div>
                        <div class="form-group">
                            <label for="tenure">Tenure</label>
                            <input type="text" class="form-control" id="tenure" name="tenure" placeholder="Enter Tenure"
                                value="<?php echo $tenure;?>">
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
            category: 'required',
            subcategory: 'required',
            title: 'required',
            sum_assured: 'required',
            premium: 'required',
            tenure: 'required',
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

    $(document).on('change', '#category', function() {
        var cid = $(this).find(":selected").val();
        getSubCategory(cid);
    });

    function getSubCategory(cid,selected) {
        $.getJSON("getSubcategory.php?id=" + cid, function(data) {
            $("#subcategory").empty();
            $("#subcategory").append("<option value=''>Select </option>");
            $.each(data, function(key, val) {
                var sel="";
                if(key==selected){sel="selected";}
                $("#subcategory").append("<option value='" + val.id + "' " + sel + ">" + val.name +
                    "</option>");
            });
        });
    }
});
</script>
<?php include "footer.php";?>