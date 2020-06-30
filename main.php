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

  <title>HOBNOB</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">


<style>
body{
    overflow-x: hidden;
}
#centered1{
  position: absolute;
  font-size: 10vw;
  top: 30%;
  left: 30%;
  transform: translate(-50%, -50%);
}
#centered2{
  position: absolute;
  font-size: 10vw;
  top: 50%;
  left: 37%;
  transform: translate(-50%, -50%);
}
#centered3{
  position: absolute;
  font-size: 10vm;
  top: 70%;
  left: 30%;
  transform: translate(-50%, -50%);
}
#signup{
    width:60%;
    border-radius: 30px;
}
#login{
  width: 60%;
  background-color:#fff;
  border: 1px solid #1da1f2;
  color: #1da1f2;
  border-radius: 30px;
}
#login:hover{
  width: 60%;
  background-color:#fff;
  border: 1px solid #1da1f2;
  color: #1da1f2;
  border-radius: 30px;
}
.well{
  background-color: #187FAB;
}
</style> 
</head>
<body>

<div class = "row">
  <div class = "col-md-12">
    <div class = "well">
      <center><h1 style = "color: white;">HOBNOB</h1></center>

    </div>
  </div>
</div>
<div class = "row">
  <div class = "col-md-6" style = "left:0.5%">
    <img src = "images/hobnob.jpg" class = "img-rounded" title = "hobnob" width = "650px" height = "565px">
    <div id = "centered1" class = "centered">
      <h3 style = "color:white;">
        <span class = "glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Follow your interests.</strong>
      </h3>
    </div>
    <div id = "centered2" class = "centered">
      <h3 style = "color:white;">
        <span class = "glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>what people are talking about.</strong>
      </h3>
    </div>
    <div id = "centered3" class = "centered">
      <h3 style = "color:white;">
        <span class = "glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>join the conversation.</strong>
      </h3>
    </div>
  </div>
  <div class = "col-md-6" style = "left: 8%">
  <img src = "images/logo.png" class = "img-rounded" title = "hobnob" width = "80px" height = "80px">
      <h2><strong>Find-Connect-Liaise!!</strong></h2>
      <form method = "post" action = "">
      <button id = "signup" class = "btn btn-info btn-lg" name = "signup">Signup</button><br><br>
      <?php
        if(isset($_POST['signup'])){
          echo "<script>window.open('signup.php','_self')</script>";
        } 
      ?>
      <button id = "login" class = "btn btn-info btn-lg" name = "login">Login</button><br><br>
      <?php
        if(isset($_POST['login'])){
          echo "<script>window.open('signin.php','_self')</script>";
        } 
      ?>


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