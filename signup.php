<?php

include("includes/connect.php");

$name = $email = $pass = $con_pass="";
$emai_err= $pass_err= $con_pass_err="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 //taking the input from the post req   
$name = $_POST["name"];
$email = $_POST["email"];
$status = "verified";
$posts = "no";


//checking if email field ids checked
   if(isset($_POST["email"])){
         $sql ="SELECT id FROM `users` WHERE email='$email'";//query to check if email exits
        $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result) > 0){ //
            $emai_err = "Email already exist";
        }
        else{ 
            // if does not exit 
            if(strlen(trim($_POST["password"]))<6){ //checking wheatrher password is 
                $pass_err = "Password must have atleast 6 charecters.";
            }
            else{
                $pass = $_POST["password"];
            }
            
            $con_pass = $_POST["con_pass"];
            if($pass != $con_pass){ // checking password matches or not
                $con_pass_err = "Password did not match";
            }
       
    
            if(empty($emai_err) && empty($pass_err) && empty($con_pass_err))
            {
                $sql = "INSERT INTO users(name,email,password,status,posts) VALUES(?,?,?,?,?)";
                if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sssss", $param_username,$param_email, $param_password,$param_status,$param_posts);
            
            // Set parameters
                    $param_username = $name;
                    $param_email = $email;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                    $param_status = $status;
                    $param_posts = $posts;
                    
            
            // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                     echo '<script>alert("Resistered successfully!!")</script>'; 
                        header("location: signin.php");
                    }
                    else{
                        echo "Something went wrong. Please try again later.";
                         }   

                } 
            }       
        }
    }
   
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

  <title>signup</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

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
#signup{
    width: 60%;
    border-radius: 30px;
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
                    <h3 style = "text-align: center;"><strong>Create your account here!!</strong></h3><hr>
                </div>
                <div class = "1-part">
                    <form action = "" method = "post">
                        <div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class = "form-control" placeholder = "name" name = "name" required = "required">
                        </div><br>
                        <!--<div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-pencil"></i></span>
                            <input type="text" class = "form-control" placeholder = "Last name" name = "last_name" required = "required">
                        </div><br>-->
                        <div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-user"></i></span>
                            <input id = "email" type="email" class = "form-control" placeholder = "Email" name = "email" required = "required">
                        </div><br>
                        <span><?php echo $emai_err; ?></span>

                        <div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-lock"></i></span>
                            <input id = "password" type="password" class = "form-control" placeholder = "Password" name = "password" required = "required">
                        </div><br>
                        <span><?php echo $pass_err; ?></span>

                        <div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-lock"></i></span>
                            <input id ="con_pass" type="password" class = "form-control" placeholder = "confirm Password" name = "con_pass" required = "required">
                        </div><br>
                        <span><?php echo $con_pass_err; ?></span>

                        <!--<div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-chevron-down"></i></span>
                            <select class = "form-control" name = "u_country" required = "required">
                                <option disabled>Select your country</option>
                                <option>India</option>
                                <option>Switzerland</option>
                                <option>Canada</option>
                                <option>Japan</option>
                                <option>Germany</option>
                                <option>Australia</option>
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>Sweden</option>
                                <option>Russia</option>
                            </select>
                        </div><br>
                        <div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-chevron-down"></i></span>
                            <select class = "form-control input-md" name = "u_gender" required = "required">
                                <option disabled>Select your gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div><br>
                        <div class = "input-group">
                            <span class = "input-group-addon"><i class = "glyphicon glyphicon-calendar"></i></span>
                            <input type="date" class = "form-control input-md" placeholder = "First name" name = "u_birthday" required = "required">
                        </div><br>-->
                        <a style = "text-decoration: none;float: right;color: #187FAB;"
                         data-toggle = "tooltip" title = "signin" href = "signin.php">Already have an account?</a><br><br>
                        <center><button id = "signup" class = "btn btn-info btn-lg" name = "sign_up">Signup</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')
  </script>
  <script src="js/bootstrap.js"></script>
    
</body>
</html>