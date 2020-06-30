<!DOCTYPE html>
<?php
    session_start();
    include("includes/header.php");
    include("functions/functions.php");

    if(!isset($_SESSION['email'])){
        header("location:index.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Find people</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "css/home_style2.css">
</head>

<body>
    <div class = "row">
        <div class = "col-md-12">
            <center><h2>Hobnob Users</h2></center><br><br>
            <div class = "row">
                <div class = "col-md-4">
                </div> 
                <div class = "col-md-4">
                    <form class = "search_form" action = "">
                        <input type="text" name = "search_user" placeholder = "Search Friend">
                        <button class =  "btn btn-info" type = "submit" name = "search_user_btn">Search<button>
                    </form>
                </div>
                <div class = "col-md-4">
                </div>
            </div><br><br>
            <?php search_user(); ?> 
        </div>
    </div>

    
</body>
</html>