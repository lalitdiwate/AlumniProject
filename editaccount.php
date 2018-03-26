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
    
    $q      = "SELECT id FROM users WHERE id!='" . $id . "' && email ='" . $email . "' ";
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

        move_uploaded_file($_FILES['dp']['tmp_name'], $path);
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
        // $dp            = basename($_FILES['dp']['name']);
        $name          = $_POST['name'];
        $dob           = $_POST['dob'];
        $designation   = $_POST['designation'];
        $organisation  = $_POST['organisation'];
        $gender        = $_POST['gender'];
        $session_start = $_POST['session_start'];
        $session_end   = $_POST['session_end'];
        $cource        = $_POST['cource'];
        $contact_no    = $_POST['contact_no'];
        $address       = $_POST['address'];
        $city          = $_POST['city'];

        $sql = "UPDATE users SET name='" . $name . "',email='" . $email . "',image='" . $image . "',dob='" . $dob . "',session_start='" . $session_start . "',session_end='" . $session_end . "',gender='" . $gender . "',cource='" . $cource . "',address='" . $address . "',city='" . $city . "',contact_no='" . $contact_no . "',organisation='" . $organisation . "',designation='" . $designation . "' WHERE id= '$id'";

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

    $sql = "SELECT * from users WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    ?>

<?php include 'header.php';?>
  <?php include 'sidebar.php';?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $row['name'] ?>" required="required">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">D.O.B</label>
                  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob'] ?>" required="required">

                </div>
 
                <select name="gender" id="gender" class="form-control" required="required">
                  <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>

                <div class="form-group">
                  <label for="exampleInputFile">Profile Image</label>
                  <input type="file" id="dp" name="dp" value="<?php echo $row['image'] ?>" >

                  
                </div>
                 
              </div>

            </div>
          </div>


<!-- Contact Information -->


            <div class="box box-primary"  >
                  <div class="box-header with-border" id="contact_card">
                  <h3 class="box-title">Contact Information</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->

                  <div class="box-body" id="contact_card_id">

                  <div class="form-group">
                  <label for="addresst">Address</label>
                  <textarea class="form-control" rows="5" id="address" placeholder="Enter Address" name="address"  required="required" ><?php echo $row['address'] ?></textarea>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value="<?php echo $row['city'] ?>" required="required">
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email'] ?>" required="required">
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Contact No.</label>
                  <input type="phone" class="form-control"   placeholder="Enter Phone No. " required="required" name="contact_no" id="contact_no" value="<?php echo $row['contact_no'] ?>">
                  </div>
                  </div>
            <!-- /.box-body -->


            </div>



 <!--   Academic Details -->
            <div class="box box-primary"  >
            <div class="box-header with-border" id="academic_card">
              <h3 class="box-title"> Academic Detail</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="academic_card_id">

              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputPassword1">Session</label>

                  <select name="session_start" id="session_start" class="form-control" required="required">  <option selected value="<?php echo $row['session_start'] ?>"><?php echo $row['session_start'] ?></option></select>
                   <div style="text-align: center; justify-content: center; margin: 5px;">
                    <p>To</p>
                   </div>
                  <select name="session_end" id="session_end"  class="form-control" required="required">  <option selected value="<?php echo $row['session_end'] ?>"><?php echo $row['session_end'] ?></option></select>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cource</label>
                  <select name="cource" id="cource" selected class="form-control" required="required">  <option value="<?php echo $row['cource'] ?>"><?php echo $row['cource'] ?></option></select>
                </div>


              </div>

            </div>
          </div>







         <!--   Job Details -->
            <div class="box box-primary"  >
            <div class="box-header with-border" id="job_card">
              <h3 class="box-title">Job Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div id="job_card_id">

              <div class="box-body">


                   
                 <div class="form-group">
                   <label for="exampleInputPassword1">User Current Status</label>
                <select name="user_current_status" id="inputUser_current_status" class="form-control" required="required">
                  <option value="<?php echo $row['user_current_status'] ?>"><?php echo $row['user_current_status'] ?></option>
                  <option value="selfemployed">selfemployed</option>
                  <option value="employed">employed</option>
                  <option value="unemployed">unemployed</option>
                </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Designation</label>


                  <input type="text" class="form-control" placeholder="Enter organisation" name="designation" id="designation" value="<?php echo $row['designation'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Organisation</label>
                  <input type="text" class="form-control" placeholder="Enter organisation" name="organisation" id="organisation" value="<?php echo $row['organisation'] ?>" required="required">
                </div>

              </div>


            </div>

<div class="pull-right">
                <button type="submit" class="btn btn-primary btn-lg" name="update">Submit</button>
              </div>
            </form>









<?php }?>







</div>

</div>

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
       $("#contact_card_id").hide();
       $("#academic_card_id").hide();
       $("#job_card_id").hide();
    });


      $("#job_card").click(function(event) {
       $("#job_card_id").toggle(500);
       $("#contact_card_id").hide();
       $("#academic_card_id").hide();
       $("#profile_id").hide();
       
    });

$("#academic_card").click(function(event) {
       $("#academic_card_id").toggle(500);
       $("#contact_card_id").hide();
        $("#profile_id").hide();
       $("#job_card_id").hide();
    });

$("#contact_card").click(function(event) {
       $("#contact_card_id").toggle(500);
$("#profile_id").hide();
       $("#academic_card_id").hide();
       $("#job_card_id").hide();
    });



  });
</script>
</body>
</html>
