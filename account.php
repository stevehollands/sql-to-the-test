<?php require_once 'header.php';
session_start();

if(!isset($_SESSION['email'])) {
    $username = $_SESSION['username'];

    $query = [
      'username' => $username
    ];

    $sql = "SELECT * FROM users WHERE username = :username";

    $sqlExec = $bdd->execute($query);
    $sqlExec ->execute($query);

    $rowcount = $sqlExec->fetch(PDO::FETCH_ASSOC);

    $_SESSION['username'] = $rowcount['username'];
    $_SESSION['firstname'] = $rowcount['username'];
    $_SESSION['lastname'] = $rowcount['lastname'];
    $_SESSION['email'] = $rowcount['email'];
    
}

?>







<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' type='text/css' href='style.css' />
        <title>Update Account</title>
    </head>
    <body>


<h1>Update Account</h1>
        <div class="container">
        <form action="auth.php" method="POST">
            
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            
            <input type="text" id="firstname" name="firstname" placeholder="Firstname" required><br>
            
            <input type="text" id="lastname" name="lastname" placeholder="Lastname" required><br>
            
            <input type="email" id="email" name="email" placeholder="Email" required><br>
            
            <input class="registerbtn" type="submit" name="update" value="Update"></button> 
            
        </form>
        <div>
        <form action="auth.php" method="POST">
            <input type="submit" name="logout" value="logout">
            </form>
    </body>
</html>

