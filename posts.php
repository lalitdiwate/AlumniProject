 <?php
include 'inc/session.php';
include 'inc/config.php';
?>

 <?php

 

$sql = "SELECT * FROM posts ";

 

$sql .= " ORDER BY created_date DESC ";
$retval = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($retval);

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
<section class="content">

<div class="col-md-offset-2 col-md-8">
  <h3>All Posts</h3>
  
    <div class="pull-right">Total Count : <span class="badge"><?php print mysqli_num_rows($retval)?></span></div>
  </div>
  <hr>
  <?php $i = 1;while ($row = mysqli_fetch_assoc($retval)) {
    ?>

    <?php
 
    $sql    = "SELECT name FROM users WHERE id =" . $row['user_id'];
    $result = mysqli_query($conn, $sql);
    $name   = mysqli_fetch_assoc($result);

    // if ($row['status'] = "pending") {


    $id = $row['id'];

        ?>

<div class="col-md-offset-2 col-md-8">

<div class="panel panel-primary bg-primary">
  <div class="panel panel-header bg-primary">
     <a href="viewp.php?pid=<?php print $row['id']; ?>"> <?php print '<b>' . $i . '. ' . $row['title'];?> </a>
        <?php if ($_SESSION['user_type'] == 'admin'): ?>
         
      
       <a href="deletep.php?id=<?php echo $id; ?>" 
    onclick="return confirm('Are you sure you wish to delete this Record?');">
     <div class="pull-right" style="margin-right: 10px; color: red;">  <span class="glyphicon glyphicon-remove"></span> </div></a>
     <?php endif ?>
  </div>
   <div class="panel-body" style="color: gray;">
    <?php print substr($row['body'],0,50).'...';?>
     
   </div>
 </div>
</div>













  <?php $i++;  } ?>
</div>


   </div>
</div>
  </div>
  </div>
<!--</div>


 -->

 
  
</section>

<?php include 'footer.php';?>


  </div>
  <!-- /.content-wrapper -->
 


        <?php include 'extra.php';?>
<!-- ./wrapper -->
<?php include 'foot.php';?>
</div>
</body>
</html>
