 <?php  
include('inc/session.php');
 ?>

 <?php include 'inc/config.php';?>


<!DOCTYPE html>
<html>
<head>
	<?php include('head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



<?php

$message = '';
if (isset($_SESSION['id'])) {

     
    $id   = $_SESSION['id'];
     
     if ($_SESSION['user_type'] == 'admin') {
      $sql    = "SELECT * FROM admins WHERE id = '$id'";
     }else  {
      $sql    = "SELECT * FROM users WHERE id = '$id'";
     }
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Could not enter data: ' . mysqli_error($conn));
    }
    $count = mysqli_num_rows($result);
    $row   = mysqli_fetch_assoc($result);

 
?>
<?php include('header.php'); ?>
  <?php include('sidebar.php'); ?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<?php if ($_SESSION['user_type'] == 'alumni'): ?>
  

<div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
    <div class="box box-primary " >
      <div class="box-header with-border" id="profile">
              <h3 class="box-title">Your Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile" id="profile_id">
              <img class="profile-user-img img-responsive img-circle" src="images/<?php echo $row['image']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION['username'] ?></h3>

              <p class="text-muted text-center">Software Engineer</p>

               

              
            </div>
            <!-- /.box-body -->
          </div>
 
<?php endif ?>



<?php if ($_SESSION['user_type'] == 'admin'): ?>
  

<div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
    <div class="box box-primary ">
      <div class="box-header with-border">
              <h3 class="box-title">Your Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="images/<?php echo $row['image'] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION['username'] ?></h3>

              <p class="text-muted text-center">Software Engineer</p>
            </div>
            <hr>
              <strong><i class="fa fa-envelope margin-r-5" style="margin-left: 20px;"></i>Email</strong>

              <p class="text-muted " style="margin-left: 23px;"><?php echo $row['email'] ?></p>

              <hr>

               

              
            </div>
            <!-- /.box-body -->
          </div>
 
<?php endif ?>

<?php if($_SESSION['user_type'] == 'alumni' ){ ?>
  


          <div class="box box-primary">
            <div class="box-header with-border" id="about_card">
              <h3 class="box-title">About Me</h3>
             
            </div>
            <!-- /.box-header -->

            <div class="box-body" id="about_card_id">
              <strong><i class="fa fa-book margin-r-5"></i> D.O.B.</strong>

              <p class="text-muted">
                &nbsp;&nbsp;<?php echo $row['dob'] ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Gender</strong>

              <p class="text-muted"><?php echo $row['gender'] ?></p>

              

               
            </div>
            <!-- /.box-body -->
         </div>

          <!-- Job Details -->

           <div class="box box-primary">
            <div class="box-header with-border" id="contact_card">
              <h3 class="box-title">Contact Information</h3>
             
            </div>
            <!-- /.box-header -->

            <div class="box-body" id="contact_card_id">
              <strong><i class="fa fa-book margin-r-5" ></i> Address</strong>

              <p class="text-muted" style="margin-left: 25px;">
              <h5>  &nbsp;&nbsp;<?php echo $row['address'] ?> </h5>
              </p>

              <hr>
              <strong><i class="fa fa-book margin-r-5" ></i> City</strong>

              <p class="text-muted" style="margin-left: 25px;">
              <h5>  &nbsp;&nbsp;<?php echo $row['city'] ?> </h5>
              </p>

              <hr><strong><i class="fa fa-book margin-r-5" ></i> Email</strong>

              <p class="text-muted" style="margin-left: 25px;">
              <h5>  &nbsp;&nbsp;<?php echo $row['email'] ?> </h5>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Phone No.</strong>

              <p class="text-muted" style="margin-left: 25px;"><?php echo $row['contact_no'] ?></p>

              

               

               
            </div>
            <!-- /.box-body -->
         </div>


 

          <!-- Academic Detail -->


           <div class="box box-primary">
            <div class="box-header with-border" id="academic_card">
              <h3 class="box-title">Academic Detail</h3>
             
            </div>
            <!-- /.box-header -->

            <div class="box-body" id="academic_card_id">
              <strong><i class="fa fa-book margin-r-5" ></i> Session</strong>

              <p class="text-muted" style="margin-left: 25px;">
              <h5>  &nbsp;&nbsp;<?php echo $row['session_start'] ?>  To &nbsp;&nbsp;<?php echo $row['session_start'] ?></h5>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Cource</strong>

              <p class="text-muted" style="margin-left: 25px;"><?php echo $row['cource'] ?></p>

              

               
            </div>
            <!-- /.box-body -->
         </div>
         

         <!-- Job Details -->

           <div class="box box-primary">
            <div class="box-header with-border" id="job_card">
              <h3 class="box-title">Job Detail</h3>
             
            </div>
            <!-- /.box-header -->

            <div class="box-body" id="job_card_id">
              <strong><i class="fa fa-book margin-r-5" ></i> User Current Status</strong>

              <p class="text-muted" style="margin-left: 25px;">
              <h5>  &nbsp;&nbsp;<?php echo $row['user_current_status'] ?> </h5>
              </p>

              <hr>
              <strong><i class="fa fa-book margin-r-5" ></i> Designation</strong>

              <p class="text-muted" style="margin-left: 25px;">
              <h5>  &nbsp;&nbsp;<?php echo $row['designation'] ?> </h5>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i>Organisation</strong>

              <p class="text-muted" style="margin-left: 25px;"><?php echo $row['organisation'] ?></p>

              

               

               
            </div>
            <!-- /.box-body -->
         </div>





<?php } ?>
          </div>


          </div>



        </div>
      </div>


 <?php } ?>
   
   

  <!-- /.content-wrapper -->
 <?php include('footer.php'); ?>

  
        <?php include('extra.php'); ?>
<!-- ./wrapper -->
<?php include('foot.php'); ?>

<script>
  
$(function() {
  


//hiding n toggling cards
       $("#contact_card_id").hide();
       $("#about_card_id").hide();
       $("#academic_card_id").hide();
       $("#job_card_id").hide();

      $("#profile").click(function(event) {
       $("#profile_id").toggle(500);
        $("#contact_card_id").hide();
       $("#about_card_id").hide();
       $("#academic_card_id").hide();
       $("#job_card_id").hide();
    });


      $("#job_card").click(function(event) {
       $("#job_card_id").toggle(500);
        $("#contact_card_id").hide();
       $("#about_card_id").hide();
       $("#academic_card_id").hide();
       
    });

$("#academic_card").click(function(event) {
       $("#academic_card_id").toggle(500);
        $("#contact_card_id").hide();
       $("#about_card_id").hide();
       
       $("#job_card_id").hide();
    });

$("#contact_card").click(function(event) {
       $("#contact_card_id").toggle(500);

       $("#about_card_id").hide();
       $("#academic_card_id").hide();
       $("#job_card_id").hide();
    });


$("#about_card").click(function(event) {
       $("#about_card_id").toggle(500);
        $("#contact_card_id").hide();
       $("#academic_card_id").hide();
       $("#job_card_id").hide();
    });






});


</script>
</body>
</html>
