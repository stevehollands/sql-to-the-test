

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    


//register

session_start();
include_once('header.php');
    if (isset($_POST['register'])):
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = hash('sha512',$_POST['password']);
        $password_confirm = hash('sha512',$_POST['passwordconfirmation']);
        
        if ($password === $password_confirm) {
            $hashed = hash('sha512', $salted);
            $query = [
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email'=> $email,
                'password' => $hashed,

            ];

            $salted = "5876786jhvkVJJigUUuv".$password."7696975343IIJHNHjHhCF";
            
            $sql = "INSERT INTO users (firstname,lastname,username,email,password)VALUES(:firstname,:lastname,:username,:email,:password)";

            $sqlExec = $bdd->prepare($sql);
            $sqlExec->execute($query);

            
            header('location: index.php');
            }
    
            else {
                header('location: register.php');
                $_SESSION['message'] = 'passwords do not match';
                $_SESSION['msg_type'] = 'alert';
                
            }
    endif;


    //login

    if (isset($_POST['login'])){
        
            $username = $_POST['username'];
            $password = hash('sha512', $_POST['password']);

            $query = [
                'username'=> $username,
                'password'=> $password


            ];

            
            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $sqlExec = $bdd->prepare($sql);
            
            $sqlExec->execute($query);
            //$query = ['username' => POST['username'], 'password' => hash('sha512', $_POST ['password'])];
            
            $row = $sqlExec->fetch(PDO::FETCH_ASSOC);

           
               
            if($row > 0) {
                
                $_SESSION['username'] = $row['username'];
                header('location:home.php');
            }
               else {
                header('location:login.php');
                $_SESSION['message'] = 'password or username not correct';
                $_SESSION['msg_type'] = 'alert';

            }  
        }
                /*if (isset($_POST['update']))   {
    
                    $username = $_SESSION['username'];
    
                    $query = [
                        'username' => $username
    
                    ];
    
                    $sql = "SELECT * FROM users WHERE username = $username";
                    $sqlExec = $bdd->prepare($sql);
                    $sqlExec->execute($query);
    
                    $rowcount = $sqlExec->fetch(PDO::FETCH_ASSOC);
    
                   */
                  

                   // huidige user uitloggen
             if(isset($_POST['logout'])){
                session_destroy();
                header('location: login.php');


             }      
                    
                
                      
    ?>

            