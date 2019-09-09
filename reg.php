<?php
if(Input::exists()){
		if (Token::check(Input::get('token'))) {

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
					
					'surname' => array(
						'min' => 2,
						'max' => 50
                    ),

                    'firstname' => array(
						'min' => 2,
						'max' => 50
                    ),

                    'othername' => array(
						'min' => 2,
						'max' => 50
                    ),

                    'email' => array(
						'min' => 2,
						'max' => 50,
						'unique' => 'users'
                    ),

                    'matric_no' => array(
                    	'required' => true,
						'min' => 2,
						'max' => 50,
						'unique' => 'users'
                    ),

                    'course' => array(
						'min'=>2,
						'max'=>50
                    ),

                    'programme' => array(
						'required' => true
                    )

                    )
			);
			if ($validation->passed()) {
					$user = new User();
					$salt = Hash::salt(32);
                    $photo = "avatar.png";

					try{
						$user->Create(array(
							'username' => Input::get('email'),
							'password' => Hash::make(Input::get('matric_no'), $salt),
							'surname' => Input::get('surname'),
							'firstname' => Input::get('firstname'),
							'othername' => Input::get('othername'),
							'email' => Input::get('email'),
							'matric_no' => Input::get('matric_no'),
     						'photo'       => $photo,
							'dob' => Input::get('dob'),
							'course' => Input::get('course'),
							'programme' => Input::get('programme'),
							'salt' => $salt,
							'joined' => date('d F Y, h:i A'),
							'group' => 1

						));

						$surname = Input::get('surname');
						$username = Input::get('email');
						$password = Input::get('matric_no');

						Session::flash('home', 'You have been Registered and can now Login');
						
						?>
				
				<div class="alert alert-success alert-dismissible fade show text-center" style="padding-right:12px;" role="alert">
                <strong>Dear <?php echo $surname; ?>!</strong> Your Login Details Are: <br/>
                <b>Username : </b> <?php echo $username; ?> AND
                <b>Password : </b> <?php echo $password; ?> <br/>
                <span>Proceed to <a href="login.php">Login</a> </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <?php
					}
                    catch(Exception $e){
						die($e->getMessage());
					}
					
				}else{
					
					foreach ($validation->errors() as $error) {
				
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