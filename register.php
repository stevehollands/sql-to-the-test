<?php include_once ('header.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' type='text/css' href='style.css' />
        <title>Register</title>
    </head>
    <body>

    <?php
    session_start();
    if(isset($_SESSION['message'])):
        ?>

    <div class="alert" <?= $_SESSION['msg_type']?>>

    <?php 

    echo $_SESSION['message'];
    unset($_SESSION['message']);
    
    ?>


</div>

<?php endif ?>;

        <h1>Register</h1>
        <div class="container">
        <form action="auth.php" method="POST">
            
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            
            <input type="text" id="firstname" name="firstname" placeholder="Firstname" required><br>
            
            <input type="text" id="lastname" name="lastname" placeholder="Lastname" required><br>
            
            <input type="email" id="email" name="email" placeholder="Email" required><br>
            
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            
            <input type="password" id="password_confirm" name="passwordconfirmation" placeholder="Confirmation" required><br>

            <input class="registerbtn" type="submit" name="register" value="Register"></button> 
            
        </form>
        <div>
    </body>
</html>