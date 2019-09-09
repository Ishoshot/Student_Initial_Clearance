<?php
require_once 'core/init.php';
$user = new User();
    if (Input::exists()) {
        # code...
        if (Token::check(Input::get('token'))) {
            # code...

            $validate = new Validate();
            $validation = $validate->check($_POST, array(
            ));

            if ($validation->passed()) {
                # code...
            
              $phot = $_FILES['photo']['name'];
              $uploadfile = $_FILES["photo"]["tmp_name"];
              $target = "profile/".basename ($_FILES ['photo']['name']);
              move_uploaded_file ($uploadfile , $target);
                try{

                    $user->update(array(
                        'photo' => $phot

                    ));
                        Session::flash('home', 'You have Successfully Changed your Profile Picture!');
                        ?>
                        <script type="text/javascript">
                            setTimeout(function(){
                            window.location.replace("welcome.php?user=<?php echo $users_id; ?>");
                                       }, 100);
                        </script>
                        <?php

                }catch(Exception $e){

                    die($e->getMessage());
                }


            }else{
                foreach ($validation->errors() as $error){
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
