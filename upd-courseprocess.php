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

            if ($validation->passed())
             {
                # code...
            // $id = $_GET['user'];
           
            $date = date('d F Y, h:i A');
            
            $file = $_FILES['file']['name'];
            
            $uploadfile = $_FILES["file"]["tmp_name"];
            $target = "course/".basename ($_FILES ['file']['name']);
            move_uploaded_file ($uploadfile , $target);

            $Update = DB::getInstance()->query("UPDATE course_form SET
                        status = '',
                        file = '$file', 
                        date = '$date'
                        WHERE c_id = '$id
                        '");

            if ($Update) 
            {
                
                Session::flash('home', 'Your Course Form has been Re-Uploaded Successfully !');
                ?>
                <script type="text/javascript">
                    setTimeout(function(){
                    window.location.replace("courseform.php?user=<?php echo $users_id; ?>");
                               }, 100);
                </script>
                <?php

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
}
?>
