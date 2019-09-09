<?php 
require_once 'core/init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GENERATE YOUR CLEARANCE REPORT</title>
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
                    <li>
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

                    <li class="active">
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
                                $matric_no = escape($user->data()->matric_no); 
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
                        <h1>Report</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li>Dashboard</li>
                            <li class="active">Report</li>
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

<?php

    $sql = DB::getInstance()->query("SELECT status FROM admission_letter WHERE matric_no ='$matric_no'");
    if ($sql->count())
    {
        $stat1 = $sql->first()->status;
        if ($stat1 == 'Approved') {
            
            $sql = DB::getInstance()->query("SELECT status FROM receipts WHERE matric_no ='$matric_no'");
            if ($sql->count())
            {
                $stat2 = $sql->first()->status;
                if ($stat2 == 'Approved') {

                    $sql = DB::getInstance()->query("SELECT status FROM course_form WHERE matric_no ='$matric_no'");
                    if ($sql->count())
                    {
                        $stat3 = $sql->first()->status;
                        if ($stat3 == 'Approved') {
                            
                            $sql = DB::getInstance()->query("SELECT status FROM o_level WHERE matric_no ='$matric_no'");
                            if ($sql->count())
                            {
                                $stat4 = $sql->first()->status;
                                if ($stat4 == 'Approved') {
                                    
                                    $sql = DB::getInstance()->query("SELECT status FROM birth WHERE matric_no ='$matric_no'");
                                    if ($sql->count())
                                    {
                                        $stat5 = $sql->first()->status;
                                        if ($stat5 == 'Approved') {
                                            
                                            $sql = DB::getInstance()->query("SELECT status FROM medicals WHERE matric_no ='$matric_no'");
                                            if ($sql->count())
                                            {
                                                $stat6 = $sql->first()->status;
                                                if ($stat6 == 'Approved') {
                                                    
                                                    $sql = DB::getInstance()->query("SELECT status FROM oath WHERE matric_no ='$matric_no'");
                                                    if ($sql->count())
                                                    {
                                                        $stat7 = $sql->first()->status;
                                                        if ($stat7 == 'Approved') {
                                                        ?>    
                                                        
                                                        <div class="col-md-12">
                                                        <div class="card">
                                                        <div class="card-header">
                                                        <strong class="card-title">CLEARANCE COMPLETED ! <span class="badge badge-success float-right mt-1">SUCCESS</span></strong>
                                                        </div>
                                                        <div class="card-body text-center">
                                                        <p class="card-text">Congratulations, You have Successfully Undergone the <b>Clearance Process</b> to be Verified that You were given Admission to this School, and Completed the Registration Process. Please Your Obligations as a Student Should be Executed as Learning is the Ultimate goal.. "You are now a licit Student of the School".</p>
                                                        <p>Please, Kindly click on the Button below to Generate Your Report</p>
    
                                                        <a href="generate.php?user=<?php echo $users_id; ?>">
                                                        <button class="btn btn-primary" style="border-radius:10px; font-weight:bold; animation:1.2s fadeIn infinite;"><i class="fa fa-download"></i> GET REPORT</button>
                                                        </a>
                                                        </div>
                                                        </div>
                                                        </div>

                                                        <?php
                                                        }   
                                                        else{
                                                            ?>
                                                        <div class="col-md-12">
                                                        <div class="card">
                                                        <div class="card-header">
                                                        <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                                        </div>
                                                        <div class="card-body text-center">
                                                        <p class="card-text">Your Uploaded Oath Form is Pending and has to be Approved By the School Management before the Completion of this Process.</p>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <?php
                                                        }
                                                    }
                                                    else{
                                                        ?>
                                                        <div class="col-md-12">
                                                        <div class="card">
                                                        <div class="card-header">
                                                        <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                                        </div>
                                                        <div class="card-body text-center">
                                                        <p class="card-text">You have to Upload an Oath Form inorder to be Approved By the School Management before the Completion of this Process.</p>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        <?php
                                                    }

                                                }
                                                else{
                                                   ?>
                                                    <div class="col-md-12">
                                                    <div class="card">
                                                    <div class="card-header">
                                                    <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                                    </div>
                                                    <div class="card-body text-center">
                                                    <p class="card-text">Your Uploaded Medical Form is Pending and has to be Approved By the School Management before the Completion of this Process. See the School Clinic for More Information.</p>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            else{
                                                ?>
                                                <div class="col-md-12">
                                                <div class="card">
                                                <div class="card-header">
                                                <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                                </div>
                                                <div class="card-body text-center">
                                                <p class="card-text">You have to Upload a Medical Form inorder to be Approved By the School Management before the Completion of this Process. See the School Clinic for More Information.</p>
                                                </div>
                                                </div>
                                                </div>
                                                <?php
                                            }

                                        }
                                        else{
                                            ?>
                                            <div class="col-md-12">
                                            <div class="card">
                                            <div class="card-header">
                                            <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                            </div>
                                            <div class="card-body text-center">
                                            <p class="card-text">Your Uploaded Birth Certificate is Pending and has to be Approved By the School Management before the Completion of this Process.</p>
                                            </div>
                                            </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <div class="col-md-12">
                                        <div class="card">
                                        <div class="card-header">
                                        <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                        </div>
                                        <div class="card-body text-center">
                                        <p class="card-text">You have to Upload a Birth Certificate inorder to be Approved By the School Management before the Completion of this Process.</p>
                                        </div>
                                        </div>
                                        </div>
                                        <?php
                                    }

                                }
                                else{
                                    ?>
                                    <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-header">
                                    <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                    </div>
                                    <div class="card-body text-center">
                                    <p class="card-text">Your Uploaded O'level Result is Pending and has to be Approved By the School Management before the Completion of this Process.</p>
                                    </div>
                                    </div>
                                    </div>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <div class="col-md-12">
                                <div class="card">
                                <div class="card-header">
                                <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                                </div>
                                <div class="card-body text-center">
                                <p class="card-text">You have to Upload an O'level Result inorder to be Approved By the School Management before the Completion of this Process.</p>
                                </div>
                                </div>
                                </div>
                                <?php
                            }

                        }
                        else{
                            ?>
                            <div class="col-md-12">
                            <div class="card">
                            <div class="card-header">
                            <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                            </div>
                            <div class="card-body text-center">
                            <p class="card-text">Your Uploaded Course Form is Pending and has to be Approved By the School Management before the Completion of this Process.</p>
                            </div>
                            </div>
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                        <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                        </div>
                        <div class="card-body text-center">
                        <p class="card-text">You have to Upload a Course Form inorder to be Approved By the School Management before the Completion of this Process.</p>
                        </div>
                        </div>
                        </div>
                        <?php
                    }
                    
                }
                else{
                    ?>
                    <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                    <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                    </div>
                    <div class="card-body text-center">
                    <p class="card-text">Your Uploaded Receipts (School fee),(Sundry fee) and (Departmental fee) are Pending and has to be Approved By the School Management before the Completion of this Process.</p>
                    </div>
                    </div>
                    </div>
                    <?php
                }
            }
            else{
                 ?>
                <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
                </div>
                <div class="card-body text-center">
                <p class="card-text">You have to Upload Receipts (School fee),(Sundry fee) and (Departmental fee) inorder to be Approved By the School Management before the Completion of this Process.</p>
                </div>
                </div>
                </div>
                <?php
            }


        }
        else{
            ?>
            <div class="col-md-12">
            <div class="card">
            <div class="card-header">
            <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
            </div>
            <div class="card-body text-center">
            <p class="card-text">Your Uploaded Admission Letter is Pending and has to be Approved By the School Management before the Completion of this Process.</p>
            </div>
            </div>
            </div>
            <?php
        }
    }
    else{
    ?>
    <div class="col-md-12">
    <div class="card">
    <div class="card-header">
    <strong class="card-title" style="color:red;">CLEARANCE UNCOMPLETED ! <span class="badge badge-danger float-right mt-1">OOPS</span></strong>
    </div>
    <div class="card-body text-center">
    <p class="card-text">You have to Upload Admission Letter inorder to be Approved By the School Management before the Completion of this Process.</p>
    </div>
    </div>
    </div>
    <?php
    }
    ?>

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
