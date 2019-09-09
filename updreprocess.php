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
            
            $school = $_FILES['school']['name'];
            $uploadfile = $_FILES["school"]["tmp_name"];
            $target = "receipts/".basename ($_FILES ['school']['name']);
            move_uploaded_file ($uploadfile , $target);

            $sundry = $_FILES['sundry']['name'];
            $uploadfile = $_FILES["sundry"]["tmp_name"];
            $target = "receipts/".basename ($_FILES ['sundry']['name']);
            move_uploaded_file ($uploadfile , $target);

            $dp_fee = $_FILES['dp_fee']['name'];
            $uploadfile = $_FILES["dp_fee"]["tmp_name"];
            $target = "receipts/".basename ($_FILES ['dp_fee']['name']);
            move_uploaded_file ($uploadfile , $target);

            $Update = DB::getInstance()->query("UPDATE receipts SET
                        status = '',
                        school = '$school', 
                        sundry = '$sundry', 
                        dp_fee = '$dp_fee', 
                        date = '$date'
                        WHERE r_id = '$id
                        '");

            if ($Update) 
            {
                
                Session::flash('home', 'Your Receipts has been Re-Uploaded Successfully !');
                ?>
                <script type="text/javascript">
                    setTimeout(function(){
                    window.location.replace("receipts.php?user=<?php echo $users_id; ?>");
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
