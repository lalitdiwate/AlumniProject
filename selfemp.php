 <?php
include 'inc/session.php';
?>
 <?php include 'inc/config.php';?>

<?php

$message = '';
if (isset($_POST['submit'])) {

    $email  = $_POST['email'];
    $pass   = md5($_POST['pass']);
    $sql    = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Could not enter data: ' . mysqli_error($conn));
    }
    $count = mysqli_num_rows($result);
    $row   = mysqli_fetch_assoc($result);

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
<div class="col-md-8 col-md-offset-2" style="margin-top: 10px;">

  	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                	<label for="exampleInputEmail1">Alumni Status</label>
                	<select class="target form-control" name="select">
    <option value="" >Select</option>
    <option value="SelfEmployed" >Self Employed</option>
    <option value="Employed">Employed</option>
    <option value="UnEmployed">UnEmployed</option>
  </select>
</div>            
  <div class="form-group" id="ll">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" id="login" style="display: none;">
                <button type="submit"  class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
      </div>

  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php';?>


<?php include 'extra.php';?>
<!-- ./wrapper -->
<?php include 'foot.php';?>

<script>
	$(document).ready(function($) {
		$( ".target" ).change(function() {

  //alert( "Handler for .change() called."+$( ".target" ).val() );

  if ($( ".target" ).val()=="SelfEmployed") { alert($( ".target" ).val()); $("#login").show(3000);}
  	if($( ".target" ).val()=="Employed") { alert($( ".target" ).val());$("#login").hide(3000);}
  	if($( ".target" ).val()=="UnEmployed") { alert($( ".target" ).val());$("#login").toggle(3000);}
});
	});

</script>
</body>
</html>
