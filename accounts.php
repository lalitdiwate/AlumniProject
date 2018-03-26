 <?php  
include('inc/session.php');
include('inc/config.php');
 ?>
<?php 

$sql = "select * from users";

$result =  mysqli_query($conn,$sql);

$count = Mysqli_num_rows($result);
   



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
  
<?php  if ($_SESSION['user_type'] == 'admin') { ?>

  	<section class="content-header">
      <h1>
       Accounts
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Accounts</li>
      </ol>
    </section>


    <section class="content">

    <div class="row">



      <div class="col-md-offset-2 col-md-8">
<div class="panel panel-default">

  <div class="panel-heading"><b><i>Users Account<i/></b></div>
<div class="panel-body">

<form action="" method="post"  name="frmListUser" id="frmListUser">
  

       <div class="panel panel-info">
      <tbody>
        <div class="table-responsive">
        <table class="table">
          <thead>
            <tr class="info">
      <th> uId</th>
     <th> Username</th>
      <th> EMAIL ID</th>
          <th>Utype </th>
      <th>Address </th>
      
      <th>Created On</th>
      <th>Roll NO </th>
        
          
       <th >Delete</th>
    </tr>
    </td>
    </tr>
  </div>
  </thead>
    <?php
  $select=mysqli_query($conn,"SELECT * FROM users  order by id desc");
  $i=2;
  while($userrow=mysqli_fetch_assoc($select))
  
  {
  $id=$userrow['id'];
  $username=$userrow['name'];
  $email=$userrow['email'];
  $address=$userrow['address'];
  $created=$userrow['created_date'];
  $roll_no=$userrow['roll_no'];
  $utype=$userrow['user_type'];
   
?>

    <!--<tr class="<?php echo $class; ?>">-->
    <tr class="warning">

      <td><?php echo $id; ?></td>
      <td><?php echo $username; ?></td>
      <td><?php echo ucwords($email); ?></td>
      <td><?php echo ucwords($utype); ?></td>
      <td><?php echo ucwords($address); ?></td>
  <td><?php echo $created; ?></td>
  <td><?php echo $roll_no; ?></td>
   
  
  <td>&nbsp;&nbsp;<a href="delete.php?id=<?php echo $id; ?>" 
    onclick="return confirm('Are you sure you wish to delete this Record?');">
       <span class="glyphicon glyphicon-remove"></span></a></td>
     
    </tr>
    <?php
  } // end while
  ?>
</div></div>
 
 
</table>
</div>
 </div>   	
   <?php } else{


    include('error404.php');
    
  } ?>
    </section>
   
  </div>
  <!-- /.content-wrapper -->
 <?php include('footer.php'); ?>

  
        <?php include('extra.php'); ?>
<!-- ./wrapper -->
<?php include('foot.php'); ?>


</body>
</html>
