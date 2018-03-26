 <?php
include 'inc/session.php';
include 'inc/config.php';
?>

<?php
$message = '';
$error   = '';
if (isset($_POST['insert'])) {

    $title  = $_POST['title'];
    $body   = $_POST['body'];
    $branch = $_POST['branch'];

    $status    = 'pending';
    $user_type = "alumni";
    $user_id   = $_SESSION['id'];

    if (!empty($_FILES['image'])) {
        // $path = "images/";
        // $path = $path . basename( $_FILES['dp']['name']);

        $temp        = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        $path = "images/vacancies/";
        $path = $path . $newfilename;

        $image = $newfilename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
            echo "The file " . basename($_FILES['image']['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }

    $sql = "INSERT INTO vacancies (title,body,image,branch,status,user_id,user_type,created_date) VALUES ('$title','$body','$image','$branch','$status','$user_id','$user_type',CURRENT_TIMESTAMP)";

    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('Could not enter data: ' . mysqli_error());
    } else {
        $message = '<span class="glyphicon glyphicon-ok-sign"></span> Well done! You successfully Posted Vacancy Details';
    }
    mysqli_close($conn);
}
?>







<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'header.php';?>
  <?php include 'sidebar.php';?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<div class="col-md-offset-2 col-md-8">


       <?php if ($message != ''): ?>
    <div class="alert alert-success alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="glyphicon glyphicon-remove"></span></button><?php print $message;?></div>
  <?php endif;?>
  <?php if ($error != ''): ?>
    <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="glyphicon glyphicon-remove"></span></button><?php print $error;?></div>
  <?php endif;?>




  <div class="box box-info" style="margin-top: 10px;">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Post</h3>
            </div>
            <div class="box-body">
              <form action="" method="post" enctype="multipart/form-data">


                <div class="form-group">
                  <label for="title">Vacancy Title:</label>

                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title Here" required="required">
                </div>


                 <div class="form-group">
                  <label for="image">Image:</label>
                  <input type="file" class="form-control" name="image" id="image" required="required">
                </div>


                  <div class="form-group">
                    <label for="input" class="control-label">Branch</label>

                      <select name="branch" id="branch" class="form-control" required="required">
                        <option value="">Select Branch</option>
                        <option value="CSE">Computer Science & Engg</option>
                        <option value="IT">Information Technology</option>
                        <option value="MECH">Mechanical Engg</option>
                        <option value="CIVIL">Civil Engg</option>
                        <option value="EXTC">Electronics Engg</option>
                        <option value="EE">Electrical Engg</option>
                      </select>

                </div>
                <div>
                  <label for="body">Vacancy Detail:</label>
                  <textarea class="textarea" placeholder="Enter Details Here" name="body" id="body"
                            style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required"></textarea>
                </div>

                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
                <div class="box-footer clearfix">


              <button type="submit" class="pull-right btn btn-default" id="savePost" name="insert">Save
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
              </form>
            </div>

          </div>

        </div>


  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php';?>


        <?php include 'extra.php';?>
<!-- ./wrapper -->
<?php include 'foot.php';?>
</body>
</html>
