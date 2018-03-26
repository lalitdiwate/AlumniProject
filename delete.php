 <?php 
 include('inc/session.php'); 
 include('inc/config.php'); 
   
  $var = $_SESSION['id'] ;
  $var1 = $_GET['id'];
   if( $var1 != $var){ 
 if(isset($_GET['id'])!="")
  {
  $delete=$_GET['id'];
  $delete=mysqli_query($conn,"DELETE FROM users WHERE id='$delete'");
  if($delete)
  {
	  header("Location:accounts.php");
  }
  else
  {
	  echo mysql_error();
  }
  }
  }else{ ?>
 <script >alert('Error')</script>
   
 <?php header("Location:accounts.php"); }
?>