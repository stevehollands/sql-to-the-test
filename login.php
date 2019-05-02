<?php include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' type='text/css' href='style.css' />
        <title>Login</title>
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
        <h1>Login</h1>
        <div class="container">
        <form action="auth.php" method="POST">
            
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="text" id="password" name="password" placeholder="Password" required><br>
            <input class="loginbtn" type="submit" name="login" value="Confirm"></button> 
            
        </form>
        <div>
    </body>
</html>
