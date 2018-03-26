 <?php  
include('inc/session.php');
include('inc/config.php');
 ?>

<?php 

  $pid = $_GET['pid'];
  $sql = 'SELECT * FROM posts WHERE id ='.$pid;
  $result = mysqli_query( $conn , $sql); 
  $row = mysqli_fetch_assoc($result);  

?>

<!DOCTYPE html>
<html>
<head>
	<?php include('head.php'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include('header.php'); ?>
  <?php include('sidebar.php'); ?><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



     <div class="col-md-offset-2 col-md-8">

   
  <div class="panel panel-primary ?>" style="margin-top: 50px;">
    
    <table class="table">
    <div class="panel-heading">
      <b>Post Title</b> :: <?php print $row['title']; ?>
      <div class="pull-right"><?php print date("d M Y H:i", strtotime($row['created_date'])); ?>  </div>
    </div>
    <div class="panel-body">
       <div class="col-md-offset-3 col-md-6">
         
      
      <img src="images/posts/<?php print $row['image']; ?>" class="img-responsive rounded-circle" alt="Image"  >
         </div>
      
    
    <br>
      <div class="message-body col-md-12" style="margin-top: 50px;"><?php print $row['body']; ?></div>
    </div>
  </div> 

</div>





   </table>
</div>
<a href="posts.php" class="text-center"><div class="btn btn-info">Go Back</div></a>
</div>
  </div>
  <!-- /.content-wrapper -->
 <?php include('footer.php'); ?>

  
        <?php include('extra.php'); ?>
<!-- ./wrapper -->
<?php include('foot.php'); ?>
</body>
</html>
