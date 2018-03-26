 <?php
include 'inc/session.php';

?>

 <?php
$error   = '';
$message = '';
include 'inc/config.php';
if (isset($_POST['update'])) {
    $id = $_SESSION['id'];

    $email = $_POST['email'];
    echo "<script>alert('Lalit')</script>";
    $q      = "SELECT id FROM admins WHERE id!='" . $id . "' && email ='" . $email . "' ";
    $result = mysqli_query($conn, $q);
    $email  = mysqli_num_rows($result);

      if (!empty($_FILES['dp'])) {
        // $path = "images/";
        // $path = $path . basename( $_FILES['dp']['name']);

        $temp        = explode(".", $_FILES["dp"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        $path = "images/";
        $path = $path . $newfilename;

        $image = $newfilename;

        if (move_uploaded_file($_FILES['dp']['tmp_name'], $path)) {
            echo "The file " . basename($_FILES['dp']['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }








    // if (!empty($_FILES['dp'])) {
    //     // $path = "images/";
    //     // $path = $path . basename( $_FILES['dp']['name']);

    //     $temp        = explode(".", $_FILES["dp"]["name"]);
    //     $newfilename = round(microtime(true)) . '.' . end($temp);

    //     $path = "images/";
    //     $path = $path . $newfilename;

    //     if (move_uploaded_file($_FILES['dp']['tmp_name'], $path)) {
    //         echo "The file " . basename($_FILES['dp']['name']) .
    //             " has been uploaded";
    //     } else {
    //         echo "There was an error uploading the file, please try again!";
    //     }
    // }

    if ($email > 0) {
        $error = 'This Email Id is already used.';
    } else {
        $email         = $_POST['email'];
         
        $name          = $_POST['name'];
         

        $sql = "UPDATE admins SET name='" . $name . "',email='" . $email . "',image='" . $image . "' WHERE id= '$id'";

        $result = mysqli_query($conn, $sql);

        if (isset($result)) {
            $message              = "Your Profile Updated Successfully";
            $_SESSION['username'] = $name;
        }

    }

}
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <?php

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    $sql = "SELECT * from admins WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    ?>

<?php include 'header.php';?>
  <?php include 'sidebar.php';?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <?php  if ($_SESSION['user_type'] == 'admin') { ?>
<!-- Main Body Here -->
<div class="col-md-offset-2 col-md-8">


  <?php if ($message != ''): ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="glyphicon glyphicon-remove"></span></button><?php print $message;?></div>
  <?php endif;?>
  <?php if ($error != ''): ?>
    <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="glyphicon glyphicon-remove"></span></button><?php print $error;?></div>
  <?php endif;?>
 <form role="form" action="" method="post" enctype="multipart/form-data">
  <div class="box box-primary" style="margin-top: 50px;">
            <div class="box-header with-border" id="profile">
              <h3 class="box-title">Edit Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="profile_id">

              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputPassword1">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $row['name'] ?>" required="required" >
                </div>

                 

                 <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email'] ?>" required="required">
                  </div>


                <div class="form-group">
                  <label for="exampleInputFile">Profile Image</label>
                  <input type="file" id="dp" name="dp" value="<?php echo $row['image'] ?>" >

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>

            </div>
          </div>


         <div class="pull-right">
                <button type="submit" class="btn btn-primary btn-lg" name="update">Submit</button>
              </div>
            </form>
















</div>

</div>
<?php } else{


    include('error404.php');
    
  } ?>


<?php }?>
  </div>
</div>

  <!-- /.content-wrapper -->
 <?php include 'footer.php';?>


        <?php include 'extra.php';?>
<!-- ./wrapper -->
<?php include 'foot.php';?>



<script>


  jQuery(document).ready(function($) {

//Getting Branch

 var branch = ['CSE','IT','MECH','EE','EXTC','CIVIL'];

 $.each(branch, function(index, val) {
   $("#cource").append("<option value="+val+">"+val+"</option>");
 });



//getting year
       var dt = new Date();
    var number = 2000;
while (number <= (new Date).getFullYear()) {
        $("#session_start , #session_end").append("<option value="+number+">"+number+"</option>");
  number++;             // -- updater
}


      //hiding n toggling cards
       $("#contact_card_id").hide();
       $("#academic_card_id").hide();
       $("#job_card_id").hide();

      $("#profile").click(function(event) {
       $("#profile_id").toggle(500);
    });


      $("#job_card").click(function(event) {
       $("#job_card_id").toggle(500);
    });

$("#academic_card").click(function(event) {
       $("#academic_card_id").toggle(500);
    });

$("#contact_card").click(function(event) {
       $("#contact_card_id").toggle(500);
    });



  });
</script>
</body>
</html>
