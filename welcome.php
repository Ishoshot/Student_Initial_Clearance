<?php 
require_once 'core/init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STUDENT CLEARANCE</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/maincon.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        
.name{
  font-size:30px;
}

.shadow{
  box-shadow:0px 0px 4px 0px #000;
}

.shadow button{
  padding:5px !important;
  margin-top:1%;
  font-family:helvetica;
  font-weight:bold;
}

.shadow i{
  animation: 1.5s wobble infinite;
  color:#e74c3c;
  font-size:15px;
}

.shadow h4{
  animation: 2s flash infinite;
}
    </style>
</head>

<body>
<?php
     
  $user = new User();

  if ($user->isLoggedIn()) {

    if ($user->hasPermission('admin')) {
       Redirect::to('admin.php');
    }
     
?> 

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>                    
                 <?php
                  $surname = escape($user->data()->surname); 
                  $firstname = escape($user->data()->firstname);
                  $users_id = escape($user->data()->users_id);
                 ?>
                 <p class="mt-3 name navbar-brand"> <?php echo $surname; ?> 
                 <?php echo $firstname; ?></p>

                 <p class="navbar-brand hidden">O</p>
            
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="welcome.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-dashboard"></i>DASHBOARD </a>
                    </li>

                    <h3 class="menu-title">ACTIVITIES</h3><!-- /.menu-title -->
    
                    <li>
                        <a href="receipts.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-file-text"></i>Upload Receipts </a>
                    </li>

                    <li>
                        <a href="admission-letterUpload.php?user=<?php echo $users_id ?>"> <i class="menu-icon fa fa-envelope"></i>Upload Admission Letter </a>
                    </li>

                    <li>
                        <a href="courseform.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-print"></i>Upload Course Form </a>
                    </li>

                    <li>
                        <a href="o-level.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-certificate"></i>Upload O'Level Result </a>
                    </li>

                    <li>
                        <a href="birthcert.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-envelope"></i>Upload Birth Certificate </a>
                    </li>

                    <li>
                        <a href="medicals.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-plus-circle"></i>Upload Medical form </a>
                    </li>

                    <li>
                        <a href="oath.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-file"></i>Upload Oath Form </a>
                    </li>

                    <li>
                        <a href="report.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-download"></i>Generate Report</a>
                    </li>

                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="menu-icon fa fa-user"></i><a href="profile.php">View My Profile</a>
                            </li>
                            <li>
                                <i class="menu-icon fa fa-pencil"></i><a href="#">Edit My Profile</a>
                            <li>
                            <li>
                                <i class="menu-icon fa fa-sign-out"></i><a href="logout.php">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <?php $photo = escape($user->data()->photo);
                                echo "<img src='profile/".$photo."' class='rounded-circle user-avatar'>"; ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                             <?php $user = escape($user->data()->users_id); ?>
                            <a class="nav-link" href="profile.php?user=<?php echo $user; ?>"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-volume-up"></i>
                    Dear <?php echo $surname .' '; echo $firstname .', '; ?>
                    <?php if (Session::exists('home')) {
                            echo Session::flash('home');
                        }        
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Got Admission this Year</p>

                        <div class="chart-wrapper px-0" style="height:100px;" height="100">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

        <div id="piechart" style="padding:0px !important;" class="col-md-4"></div>

    <div class="card col-md-4 shadow" style="padding:0px;">
                <div class="card-body bg-flat-color-4 text-white text-center" style="padding:25px;">
            <h4>CHANGE PROFILE PICTURE ?</h4>
            <p class="mt-3 mb-2">Click the Button below.</p>
            <i class="fa fa-arrow-down text-white"></i> <br/>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  CLICK ON ME
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:#000;" id="exampleModalLabel">Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php require 'p-profile.php'; ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label style="color:#000;">Select Profile Picture:</label>
                <input class="form-control" type='file' style="padding:3px;" name="photo" accept=".png, .jpg, .jpeg" required />
            </div>
            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            <input type="submit" class="btn btn-success" value="Save Changes" style="border-radius:5px;"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger" style="border-radius:5px;" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
    
    </div>
</div>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Profile', 'Completed'],
  ['Completed', 20],
  ['Uncompleted', 6]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Rate of Complete and Imcomplete Registration In Nigerian Schools', 'width':300, 'height':200};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

<div class="col-md-12 text-center mb-2 mt-2">

      <div class="card col-md-4 mt-5 p-3">
        <div class="card-body bg-flat-color-0">
          <div class="div-square">
            <a href="receipts.php?user=<?php echo $users_id; ?>">
            <i class="fa fa-file-text fa-5x"></i>
            <h4>RECEIPTS</h4>
            </a>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
          </div>
        </div>
      </div> 

      <div class="card col-md-4 mt-5 p-3">
        <div class="card-body bg-flat-color-0">
          <div class="div-square">
            <a href="admission-letterUpload.php?user=<?php echo $users_id; ?>">
            <i class="fa fa-envelope fa-5x"></i>
            <h4>ADMISSION LETTER</h4>
            </a>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 60%; height: 5px;"></div>
          </div>
      </div>
      </div> 

      <div class="card col-md-4 mt-5 p-3">
        <div class="card-body bg-flat-color-0">
          <div class="div-square">
            <a href="courseforms.php?user=<?php echo $users_id; ?>">
            <i class="fa fa-print fa-5x"></i>
            <h4>COURSE FORM</h4>
            </a>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 80%; height: 5px;"></div>
          </div>
      </div>
      </div> 

</div>

<div class="col-md-12 text-center mt-2 mb-2">

      <div class="card col-md-4 mt-5 p-3">
        <div class="card-body bg-flat-color-0">
          <div class="div-square">
            <a href="o-level.php?user=<?php echo $users_id; ?>">
            <i class="fa fa-certificate fa-5x"></i>
            <h4>O'LEVEL RESULT</h4>
            </a>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 59%; height: 5px;"></div>
          </div>
      </div>
      </div> 

      <div class="card col-md-4 mt-5 p-3">
        <div class="card-body bg-flat-color-0">
          <div class="div-square">
            <a href="birthcert.php?user=<?php echo $users_id; ?>">
            <i class="fa fa-info fa-5x"></i>
            <h4>BIRTH CERTIFICATE</h4>  
            </a>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 29%; height: 5px;"></div>
          </div>
      </div>
      </div> 

      <div class="card col-md-4 mt-5 p-3">
        <div class="card-body bg-flat-color-0">
          <div class="div-square">
            <a href="medicals.php?user=<?php echo $users_id; ?>">
            <i class="fa fa-plus-circle fa-5x"></i>
            <h4>MEDICAL FORM</h4>
            </a>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      </div>   

</div>

<div class="col-md-12 text-center mt-2 mb-2">

      <div class="card col-md-4 mt-5 p-3">
        <div class="card-body bg-flat-color-0">
          <div class="div-square">
            <a href="oath.php?user=<?php echo $users_id; ?>">
            <i class="fa fa-file fa-5x"></i>
            <h4>OATH FORM</h4>
            </a>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 79%; height: 5px;"></div>
          </div>
      </div>
      </div> 

      <div class="col-md-4 mt-5"></div> 

      <div class="col-md-4 mt-5"></div>   

</div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php

}

else

{

  redirect::to('login.php');

}

?>

    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>

</body>

</html>
