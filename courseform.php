<?php 
require_once 'core/init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COURSE FORM UPLOAD</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

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

    $users_id = escape($user->data()->users_id); 
    $surname = escape($user->data()->surname); 
    $firstname = escape($user->data()->firstname);
    $username = escape($user->data()->email);
    $password = escape($user->data()->matric_no);
    $matric_no = escape($user->data()->matric_no);
    $email = escape($user->data()->email);
    $othername = escape($user->data()->othername);
    $dob = escape($user->data()->dob);
    $course = escape($user->data()->course);
    $programme = escape($user->data()->programme);
    $photo = escape($user->data()->photo);
    $joined = escape($user->data()->joined);
                
?> 
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>                    
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
                        <a href="admission-letterUpload.php?user=<?php echo $users_id; ?>"> <i class="menu-icon fa fa-envelope"></i>Upload Admission Letter </a>
                    </li>

                    <li class="active">
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
                             <?php
                                echo "<img src='profile/".$photo."' class='rounded-circle user-avatar'>";?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> My Profile</a>

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
                        <h1>Course Form</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="#">Dashboard</li>
                            <li class="active">Course Form</li>
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
    $query = DB::getInstance()->get('course_form',
                    array(
                        'matric_no', '=', $matric_no
                       ));
    if ($query->count())
    {
        $app = $query->first()->status;
        $id = $query->first()->c_id;

        if ($app == 'Not Approved')
            {
                echo "

                <div class='col-md-2'></div>
                <div class='col-md-8 jumbotron mt-5 text-center' style='box-shadow:0px 0px 7px 1px #000; padding:30px;'>
                    <div class='alert  alert-warning alert-dismissible fade show' role='alert'>
                    Dear " .$surname .", Only <b>pdf</b> and <b>docx</b> format is Advisable
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='alert  alert-danger alert-dismissible fade show' role='alert'>
                    Your Uploaded Course Form was not Approved due to the Clarity 
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                ";?>

                    <?php require 'upd-courseprocess.php'; 
                    echo "<form action='' method='POST' enctype='multipart/form-data'>
                        <div class='form-group mt-4'>
                            <label><b>CHOOSE FILE: </b></label>
                        <input type='file' name='file' class='form-control' style='padding:3px;' accept='.docx, .pdf' required>
                        </div>
                        <input type='hidden' name='token' value='". Token::generate() ."'>
                        <input type='submit' class='btn btn-success mt-4' value='UPLOAD' style='border-radius:5px; float:left;'/>
                        <input type='reset' class='btn btn-danger mt-4' value='CANCEL' style='border-radius:5px; float:right;'/>
                    </form>
                </div>
                <div class='col-md-2'></div> ";
            }
            
            else if ($app == "Approved")
            {
                ?>
                <div class="col-md-12 mt-5">
                <div class="card">
                <div class="card-header">
                <strong class="card-title">COURSE FORM APPROVED ! <span class="badge badge-success float-right mt-1">SUCCESS</span></strong>
                </div>
                <div class="card-body text-center">
                <p class="card-text">Congratulations, Your Course Form has Successfully been Approved. </p>
                </div>
                </div>
                </div>
                <?php
            }

            else
            {
                ?>
                <div class="col-md-12 mt-5">
                <div class="card">
                <div class="card-header">
                <strong class="card-title">COURSE FORM ! <span class="badge badge-success float-right mt-1">SUCCESS</span></strong>
                </div>
                <div class="card-body text-center">
                <p class="card-text"> Your Course Form is pending and will be treated shortly. </p>
                </div>
                </div>
                </div>
                <?php
            }

            
    } 
            
            else
            {
                echo "
                <div class='col-md-2'></div>
                <div class='col-md-8 jumbotron mt-5 text-center' style='box-shadow:0px 0px 7px 1px #000; padding:30px;'>
                    <div class='alert  alert-warning alert-dismissible fade show' role='alert'>
                    Dear " .$surname .",  Only <b>pdf</b> and <b>docx</b> format is Advisable
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                ";?>

                    <?php require 'courseprocess.php'; 
                    echo "<form action='' method='POST' enctype='multipart/form-data'>
                        <div class='form-group mt-4'>
                            <label><b>CHOOSE FILE: </b></label>
                        <input type='file' name='file' class='form-control' style='padding:3px;' accept='.docx, .pdf' required>
                        </div>
                        <input type='hidden' name='token' value='". Token::generate() ."'>
                        <input type='submit' class='btn btn-success mt-4' value='UPLOAD' style='border-radius:5px; float:left;'/>
                        <input type='reset' class='btn btn-danger mt-4' value='CANCEL' style='border-radius:5px; float:right;'/>
                    </form>
                </div>
                <div class='col-md-2'></div> ";
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
