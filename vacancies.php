 <?php
include 'inc/session.php';
include 'inc/config.php';
?>

 <?php

$rpp = 5;
 isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

 if ($page > 1) {
     $start = ($page*$rpp)-$rpp;
   } else {
    $start = 0;
   }
    
    $end = $start + $rpp; 

$sql = "SELECT * FROM vacancies ";

if (isset($_GET['branch'])) {
    $branch = $_GET['branch'];
    $sql .= " WHERE branch = '$branch'";
}

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
  <h3>All Vacancies</h3>
  <div class="filter">Filter By Branch :
    <!-- <a href="vacancies.php"><span class="label label-default">All</span></a> -->
    <a href="?branch=CSE"><span class="label label-success">CSE</span></a>
    <a href="?branch=IT"><span class="label label-info">IT</span></a>
    <a href="?branch=MECH"><span class="label label-warning">MECH</span></a>
    <a href="?branch=CIVIL"><span class="label label-danger">CIVIL</span></a>
    <a href="?branch=EXTC"><span class="label label-default">EXTC</span></a>
    <a href="?branch=EE"><span class="label label-primary">EE</span></a>
    <div class="pull-right">Total Count : <span class="badge"><?php print mysqli_num_rows($retval)?></span></div>
  </div>
  <hr>
  <?php $i = 1;while ($row = mysqli_fetch_assoc($retval)) {
    ?>

    <?php
$status = $row['branch'];
    if ($status == 'CSE') {
        $label = 'success';
    } elseif ($status == 'IT') {
        $label = 'info';
    } elseif ($status == 'MECH') {
        $label = 'warning';
    } elseif ($status == 'CIVIL') {
        $label = 'danger';
    }elseif ($status == 'EXTC') {
        $label = 'default';
    }elseif ($status == 'EE') {
        $label = 'primary';
    }

    $sql    = "SELECT name FROM users WHERE id =" . $row['user_id'];
    $result = mysqli_query($conn, $sql);
    $name   = mysqli_fetch_assoc($result);

    // if ($row['status'] = "pending") {


    $id = $row['id'];

        ?>



<div class="panel panel-<?php print $label;?>">
  <div class="panel panel-header bg-<?php print $label;?>">
     <a href="view.php?vid=<?php print $row['id']; ?>"> <?php print '<b>' . $i . '. ' . $row['title'];?> </a> 
       <?php if ($_SESSION['user_type'] == 'admin'): ?>
         
      
       <a href="deletev.php?id=<?php echo $id; ?>" 
    onclick="return confirm('Are you sure you wish to delete this Record?');">
     <div class="pull-right" style="margin-right: 10px; color: red;">  <span class="glyphicon glyphicon-remove"></span> </div></a>
     <?php endif ?>
  </div>
   <div class="panel-body">
    <?php print $row['body']. '...';?>
     
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
