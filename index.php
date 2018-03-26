 <?php  
include('inc/session.php');
include('inc/config.php');
 ?>
<?php 

$sql = "select * from users";

$result =  mysqli_query($conn,$sql);

$count = Mysqli_num_rows($result);

$query = "SELECT user_current_status, count(*) as number FROM users GROUP BY user_current_status";  
 $result1 = mysqli_query($conn, $query);  



 $vacancy = "select * from vacancies";

 $result2 =  mysqli_query($conn,$vacancy);

$vacancynum = Mysqli_num_rows($result2);

$vacancy = "select * from posts";

 $result3 =  mysqli_query($conn,$vacancy);

$postnum = Mysqli_num_rows($result3);
 



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
  


  	<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">

    <div class="row">
<?php if ($_SESSION['user_type'] == 'admin'): ?>
    	<div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count;?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col --> 

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $vacancynum ?></h3>

              <p>Total Vacancy</p>
            </div>
            <div class="icon">
              <i class="ion ion-pinpoint"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $postnum ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-mail"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        </div>


	
<?php endif ?>

<div class="row col-md-offset-2 col-md-8">



<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">User Current Status
 Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
               <div id="piechart" style="width: auto;">
               	
               </div>
           </div>
            <!-- /.box-body-->
          </div>



	
</div>




    	
    </section>
   
  </div>
  <!-- /.content-wrapper -->
 <?php include('footer.php'); ?>

  
        <?php include('extra.php'); ?>
<!-- ./wrapper -->
<?php include('foot.php'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['User_current_status', 'Number'],
      <?php
      if($result->num_rows > 0){
          while($row = $result1->fetch_assoc()){
            echo "['".$row['user_current_status']."', ".$row['number']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'User Current Status',
       color: {
        pattern: ['#1f77b4', '#aec7e8', '#ff7f0e', '#ffbb78', '#2ca02c', '#98df8a', '#d62728', '#ff9896', '#9467bd', '#c5b0d5', '#8c564b', '#c49c94', '#e377c2', '#f7b6d2', '#7f7f7f', '#c7c7c7', '#bcbd22', '#dbdb8d', '#17becf', '#9edae5']
    },
        height: 400,
        is3D:true,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}

</script>
</body>
</html>
