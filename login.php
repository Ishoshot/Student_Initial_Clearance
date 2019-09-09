<?php 
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN TO CONTINUE</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/maincon.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                
                <div class="login-logo">
                    <h2 style="color:#fff;">LOGIN TO CONTINUE</h2>
                </div>
                
            <div class="login-form">

<?php
if (Session::exists('home')) {
  echo '<p>'. Session::flash('home') .'</p>';
  }   

    if (Input::exists()) {
        
        if (Token::check(Input::get('token'))) {
        
        $validate = new  Validate();
         $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
         ));

         if ($validation->passed()) {
            $user = new User();
            $remember =(Input::get('remember')==='on') ? true : false;
            $login = $user->login(Input::get('username'),  Input::get('password'), $remember);

            if($login)
            {

            if ($user->hasPermission('admin'))
            {
                Redirect::to('admin.php');
            }
            else
            {
                Redirect::to('welcome.php');
            }

            }
            else
            {
                ?>   
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo '<p style="color:red;"> Oops! Login Faled, Check your Details and Try Again </p>'; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }

        }
     
    else
     
    {
        foreach ($validation->errors() as $error)
        {
           ?>   
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error, '<br>'; ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php                
        }
         
    }

    }

}

?>

    <form action="" method="POST">
        
        <div class="form-group">
            <label style="font-weight:bold;">Username:</label>
            <input type="text" class="form-control" placeholder="I would Enter My Username here" name="username" autocomplete="off" id="username">
            <span class="text-muted">hint: same as your Email Address</span>
        </div>
        
        <div class="form-group">
            <label style="font-weight:bold;">Password:</label>
            <input type="password" class="form-control" placeholder="I would Enter My Password here" name="password" autocomplete="off" id="password">
            <span class="text-muted">hint: same as your Matric Number </span>
        </div>
        
        <div class="checkbox mt-5">
            <label><input type="checkbox" name="remember" id="remember"> Remember Me</label>
            <label class="pull-right">
                <a href="pages-forget.html">Forgotten Password?</a>
            </label>
        </div>
        
        <input type="hidden" name="token" value="<?php echo Token::generate();?>">

        <div class="row mt-5 mb-5">
            <div class="col">
             <button type="submit" class="btn btn-success btn-flat">
             Sign in</button>
            </div>

            <div class="col">
             <input type="reset" class="btn btn-danger btn-flat" value="CANCEL">
            </div>
        </div>
    
        <div class="register-link m-t-15 text-center">
            <p>Don't have account ? <a href="register.php"> Sign Up Here</a></p>
        </div>

    </form>
</div>
</div>
</div>
</div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
