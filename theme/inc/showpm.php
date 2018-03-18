<?php include('inc/session.php'); ?>
<?php include('header.php'); ?>
<?php 

  $uid = $_SESSION['uid'];
  $sql = 'SELECT * FROM pm WHERE uid ='.$uid.'desc';
  $result = mysql_query( $sql, $conn ); 
  $row = mysql_fetch_assoc($result);  

?>
<div class="col-md-12">
 <div class="col-md-4">
        <?php include('sidebar.php'); ?>
 </div>
<div class="col-md-8">

  
  <div class="panel panel-info">
    
    <table class="table">
    <div class="panel-heading">
      <b>From</b> :: <?php print $row['sender']; ?>
      <div class="pull-right"><?php print date("d M Y H:i", strtotime($row['created_date'])); ?></div>
    </div>
    <div class="panel-body">
    
    <br>
      <div class="message-body"><?php print $row['message']; ?></div>
    </div>
  </div> 

</div>

</div>


<?php include('footer.php'); ?>