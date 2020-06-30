<?php
include ("includes/connect.php");
session_start();
if(isset($_POST['login'])){
    
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "select email,password from users where email='$email' ";
    $result = mysqli_query($link,$sql);
    $res = mysqli_fetch_array($result);
    $hash = $res['password'];
    if(mysqli_num_rows($result) == 1){
        
        if(password_verify($password,$hash)){
        session_start();
        $_SESSION["email"] = $email;
        
        echo "<script>window.open('home.php','_self')</script>";
        }
    }
    else{
        echo "<script>alert('Your email or password is incorrect.')</script>";

    }
    
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<style>
body{
    overflow-x: hidden;
}
.main-content{
    width: 50%;
    height: 40%;
    margin: 10px auto;
    background-color: #fff;
    border: 2px solid #e6e6e6;
    padding: 40px 50px;
}
.header{
    border: 0px solid #000;
    margin-bottom: 5px;
}
.well{
  background-color: #187FAB;
}
#signin{
    width: 60%;
    border-radius: 30px;
}
.overlap-text{
    position: relative;
}
.overlap-text a{
    position: absolute;
    top: 8px;
    right: 10px;
    font-size: 14px;
    text-decoration: none;
    font-family: 'Overpass Mono', monospace;
    letter-spacing: -1px;
}
</style>
<body>
<div class = "row">
    <div class = "col-md-12">
        <div class = "well">
            <center><h1 style = "color: white;">HOBNOB</h1></center>

        </div>
    </div>
</div>
<div class = "row">
    <div class = "col-md-12">
        <div class = "main-content">
            <div class = "header">
                <h3 style = "text-align: center;"><strong>Login </strong></h3><hr>
            </div>
            <div class = "l-part">
                <form action = "" method = "post">
                    <input type = "email" name = "email" placeholder = "Email" required = "required" 
                    class = "form-control input-md"><br>
                    <div class = "overlap-text">
                        <input type="password" name="pass" placeholder = "password" required = "required" 
                        class = "form-control input-md"><br>
                        
                    </div>
                    <a style = "text-decoration: none;float: right;color: #187FAB;"
                     data-toggle = "tooltip" title = "Create account" href = "signup.php">Don't have an account?</a>
                     <br><br>
                     <center><button id = "signin" class = "btn btn-info btn-lg" name = "login">Login</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>