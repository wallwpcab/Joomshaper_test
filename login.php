<?php
require __DIR__ .'/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DB;
session_start();

if(isset($_SESSION['username'])){
    if($_SESSION['username'] != NULL){
       header('Location: dashboard.php');
            exit();
 }
 
 // echo("<meta http-equiv="refresh" content="0"; url=dashboard.php"> ");
}

if(isset($_POST['username']) || isset($_POST['password'])){
    
    $email = $_POST['username'];
    $password = $_POST['password'];
    if(empty($password)){
        echo "Password is empty, Password cant be empty <br>";
    }if(empty($email)){
      echo "Email is empty, E-mail cant be empty <br>";
    }
    $user = DB::table('register')->where('Email', $email)->first();
    if($user){        
      if($user->Password != $password ){
         echo "Password not matched <br>";
         echo "ggggg";
         exit();
      }
      else{
         $_SESSION['username'] = $email;
            header('Location: dashboard.php');
            exit();
        }   
    }else{
        echo " User not found <br>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <form class="form" method="post" action="login.php">
        <h1 class="login-title">Login</h1>
        <input value="btavo@demo.com" type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input value="123456" type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
        <p class="link"><a href="product_page.php">Product list page</a></p>
        <p class="link"><a href="OrderList_page.php">Order list page</a></p>

    </form>
</body>
</html>