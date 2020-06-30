<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
    include("connect.php");     
  
?>
<title>admin main</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "css/home_style1.css">
</head>

<body>
<nav class = "navbar navbar-default">
    <div class = "container-fluid">
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle collapsed" data-target= "#bs-example-navbar-collapse-1"
             data-toggle = "collapse" aria-expanded = "false">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand">Hobnob</a>
        </div>
        <div class = "collapse navbar-collapse" id = "#bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav">
                <li><a href = 'admin_members.php'>View Users</a></li>
                <li><a href = 'admin_posts.php'>View Posts</a></li>
                
                    <li class = 'dropdown'>
                        <a href = '#' class = 'dropdown-toggle' data-toggle = 'dropdown' role = 'button'
                         aria-haspopup = 'true' aria-expanded = 'false'><span><i class = 'glyphicon glyphicon-chevron-down'>
                         </i></span></a>
                    <ul class = 'dropdown-menu'>
                        
                        <li>
                            <a href = 'admin_logout.php'>Logout</a>
                        </li>
                    </ul>
                    </li>
                    

            </ul>
            <ul class = "nav navbar-nav navbar-right">
                <li class = "dropdown">
                    <form class = "navbar-form navbar-left" method = "get" action = "users/results.php">
                        <div class = "form-group">
                            <input type = "text" class = "form-control" name = "user_query" placeholder = "Search">
                        </div>
                        <button type = "submit" class = "btn btn-info" name = "search">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="jumbotron">
      <div class="container">
      <h1 style = "color:green;"><center>Welcome Admin!!!</center></h1>
      
    </div>
  </div>
</nav>
</body>
</html>