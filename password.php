<?php
    require_once 'header.php';
    session_start();

        $validate = new Validate ();
        $validation = $validate->check($_POST, array(

            'password' => array(
                'required' => true,
                //'min' => 8
            ),

            'password_new' => array(
                'required' => true,
                //'min' => 8

            ),

            'password_new_confirm' =>array(
                'required' => true,
                //'min => 8,
                'matches' => 'password_new'

            )
        ));

    if($validation->passed()) {
        //passwoord wordt vervangen

        if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password);
            echo 'your current password is wrong.';
        }

        else {
            //echo 'OK!';
        }
            

        else {
            foreach($validation->errors() as $error) {
            echo $error, '<br>';
        }


    }

?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' type='text/css' href='style.css' />
        <title>Change Password</title>
    </head>
    <body>


<h1>Change Password</h1>
        <div class="container">
        <form action="auth.php" method="POST">
            
        <input type="password" id="password" name="password" placeholder="Old Password" required><br>
        
        <input type="password" id="newpassword" name="newpassword" placeholder="New Password" required><br>
               
        <input type="password" id="password_confirm" name="passwordconfirmation" placeholder="Confirm New Pasword" required><br>
        
        <input class="registerbtn" type="submit" name="update" value="Update"></button> 
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">   
        </form>
        <div>
    </body>
</html>