
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/<?php echo $_SESSION['pic']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
            
         
          <ul class="treeview-menu">
            <li class="active"><a href="index.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
             
          </ul>
         
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Account</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
             
            <li><a href="account.php"><i class="fa fa-circle-o"></i>Account</a></li>
            <?php if ($_SESSION['user_type'] == 'alumni'): ?>
              <li><a href="editaccount.php"><i class="fa fa-circle-o"></i>Edit Account</a></li>
            <?php endif ?>
            
            
            <?php if ($_SESSION['user_type'] == 'admin'): ?>
               <li><a href="editaccounta.php"><i class="fa fa-circle-o"></i>Edit Account</a></li>
            <li><a href="accounts.php"><i class="fa fa-circle-o"></i>Accounts</a></li>  
            <?php endif ?>
            
            
          </ul>
        </li>


         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Vacancy</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu"> 
            <li><a href="newvacancy.php"><i class="fa fa-circle-o"></i>New Vacancy</a></li>
            <li><a href="vacancies.php?branch=CSE"><i class="fa fa-circle-o"></i>Vacancies</a></li>
             
          </ul>
        </li>
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Post</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu"> 
             <?php if ($_SESSION['user_type'] == 'admin'): ?>
            <li><a href="newpost.php"><i class="fa fa-circle-o"></i>New Post</a></li>
                 <?php endif ?>
            <li><a href="posts.php"><i class="fa fa-circle-o"></i>Posts</a></li>
             
          </ul>
        </li>
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
