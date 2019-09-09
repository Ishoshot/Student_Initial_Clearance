<?php 
require_once 'core/init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COURSE FORMS</title>
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

    if (!$user->hasPermission('admin')) {
       Redirect::to('welcome.php');
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

    $id = $_GET['id'];
    $sql = DB::getInstance()->query("SELECT * FROM course_form where c_id ='$id'");
    if ($sql->count()) {
    ?>
        
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background-color:rgb(86, 61, 124);">
        <nav class="navbar navbar-expand-sm navbar-default" style="background-color:rgb(86, 61, 124);">

            <div class="navbar-header" style="background-color:rgb(86, 61, 124);;">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>                    
                 <p class="mt-3 name navbar-brand" style="border-bottom:1px solid #fff;"> <?php echo $surname; ?> 
                 </p>

                 <p class="navbar-brand hidden">O</p>
            
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="admin.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title" style="color:#fff;">ACTIVITIES</h3><!-- /.menu-title -->
    
                    <li>
                        <a href="allreceipts.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-file-text"></i> Receipts </a>
                    </li>

                    <li>
                        <a href="admission-letters.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-envelope"></i>Admission Letters </a>
                    </li>

                        <li class="active">
                        <a href="course-forms.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-print"></i>Course Forms </a>
                    </li>

                    <li>
                        <a href="allo-levels.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-certificate"></i> O'Level Results </a>
                    </li>

                    <li>
                        <a href="allbirth-certs.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-envelope"></i>Birth Certificates </a>
                    </li>

                    <li>
                        <a href="allmedicals.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-plus-circle"></i> Medical forms </a>
                    </li>

                    <li>
                        <a href="alloaths.php?user=<?php echo $surname; ?>"> <i class="menu-icon fa fa-file"></i> Oath Forms </a>
                    </li>

                    <h3 class="menu-title" style="color:#fff;">Extras</h3><!-- /.menu-title -->

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
                        <h1>Course Forms</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="#">Dashboard</li>
                            <li class="active">Course Forms</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-volume-up"></i>
                    Dear <?php echo $surname .', '; ?>
                    <?php if (Session::exists('home')) {
                            echo Session::flash('home');
                        }        
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

        <!-- content here -->

        <div class="col-md-12 text-center">
            <h3> <b>CLICK TO PREVIEW: </b><br/><br/>
            <a href="course/<?php echo $sql->first()->file ?>" target="_blank">
                <?php echo $sql->first()->file; ?>
            </a>
            </h3>

            <div class="col-md-3"></div>
            <div class="form jumbotron col-md-6" style="margin-top:10%; box-shadow:0px 0px 7px 1px #000; padding:30px;">
                <?php 
                if(Input::exists()){
                    if (Token::check(Input::get('token'))) {
                        
                        $status = input::get('status');
                        $status_date = date('d F Y, h:i A');

                    $Update = DB::getInstance()->query("UPDATE course_form SET
                        status = '$status', 
                        status_date = '$status_date' 
                        WHERE c_id = '$id
                        '");

                    if ($Update) {
                        Session::flash('home', 'The Action Performed is Successful !!!');
                        ?>
                        <script type="text/javascript">
                            setTimeout(function(){
                            window.location.replace("course-forms.php?user=<?php echo $surname; ?>");
                                       }, 100);
                        </script>
                        <?php
                     }else{
                        echo "ERROR !!!";
                     }
                
                }
                }
                ?>
                <form action="" method="POST">
                <h4>FEEDBACK</h4>
                    <div class="form-group mt-3">
                        <select class="form-control" name="status" required>
                            <option>~ Please Select ~</option>
                            <option value="Approved">Approve</option>
                            <option value="Not Approved">Not Approve</option>
                        </select>
                    </div>  
                    <input type="hidden" name="token" value="<?php echo Token::generate();?>">    
                    <button type="submit" class="btn btn-success m-b-30 m-t-30 mb-3">
                    Finalize</button>            
                </form>
            </div>
            <div class="col-md-3"></div>

        </div>

        <!-- content ends here -->
    
    <?php

        }
    
        else
    
        {
    
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p>THERE WAS A PROBLEM RECOVERING DATA !!!</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
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
