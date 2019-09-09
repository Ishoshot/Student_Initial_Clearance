<?php
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REGISTRATION...</title>
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

    <div class="e-login d-flex align-content-center flex-wrap" style="padding:0px;">
        <div class="container" style="padding:0px;">
            <div class="login-content" style="padding:0px; max-width:800px;">
                
                <div class="login-logo">
                    <h2 style="color:#fff;">COMPLETE TO REGISTER</h2>
                </div>
            
            <div class="login-form">
                <div class="alert alert-warning alert-dismissible fade show" style="padding-right:12px;" role="alert">
                <strong>Dear Mapaite!</strong>  Before the Completion of this Process, You must <br/>
                <ul class="ml-4 mt-2">
                    <li>Have been Offered Admission by the School or Provisional Admission by JAMB</li>
                    <li>Have Made Payment and Undergone the Medicals</li>
                    <li>Have Possess a Matriculation Number and A Valid Email Address</li>
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    
                    <form action="" method="POST">
                        <?php require 'reg.php'; ?>
                        <div class="form-row form-group">
                            <div class="col">
                            <input type="text" class="form-control" placeholder="Enter Username here" name="username" hidden>
                            </div>

                            <div class="col">
                            <input type="password" class="form-control" placeholder="Enter Password here" name="password" hidden>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Surname <span style="color:red;">*</span></label>
                            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter Surname here" name="surname" required autocomplete="off">
                        </div>
                            
                        <div class="form-row form-group">
                            <div class="col">
                            <label>firstname <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Firstname here" name="firstname" required autocomplete="off">
                            </div>

                            <div class="col">
                            <label>othername <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Othername here" name="othername" required autocomplete="off">
                            </div>
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                            <label>Email <span style="color:red;">*</span></label>
                            <input type="email" class="form-control" placeholder="Enter Email here" name="email" required autocomplete="off">
                            </div>

                            <div class="col">
                            <label>Matric No <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Matric No here" name="matric_no" autocomplete="off">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>date of birth <span style="color:red;">*</span></label>
                            <input type="date" class="form-control" placeholder="Enter DOB here" name="dob" required autocomplete="off">
                        </div>

                        <div class="form-row form-group">
                            <div class="col">
                            <label>Course <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Course of Study here" name="course" required autocomplete="off">
                            </div>

                            <div class="col">
                            <label>Programme <span style="color:red;">*</span></label>
                            <select class="form-control" name="programme" required>
                                <option>~ Please Select ~</option>
                                <option value="ND FULL TIME">ND - FULL TIME 2 YEARS</option>
                                <option value="HND FULL TIME">HND - FULL TIME 4 YEARS</option>
                                <option value="ND PART TIME">ND - PART TIME 2 YEARS</option>
                                <option value="HND PART TIME">HND - PART TIME 4 YEARS</option>
                            </select>
                            </div>
                        </div>

                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label mb-4" for="customCheck1" style="text-transform:capitalize;">Agree to Terms and Conditions ?
                          </label>
                        </div>
                        
                        <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                        
                        <button type="submit" class="btn btn-success m-b-30 m-t-30 mb-3">
                        Register</button>

                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
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
