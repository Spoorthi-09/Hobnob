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
    <?php
        $user = $_SESSION['email'];
        $get_user = "select * from users where email = '$user'";
        $run_user = mysqli_query($link,$get_user);
        $row = mysqli_fetch_array($run_user);
    
         $name = $row['name'];
    ?>
    <title><?php echo "$name"; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "css/home_style2.css">
</head>

<body>
    <div class = "row">
        <div class = "col-md-12" id = "insert_post">
            <center>
            <form action = "home.php?id=<?php echo $user_id;?>" method = "post" id = "f" 
            enctype = "multipart/form-data">
            <textarea class = "form-control" id = "content" rows = "2" name = "content" 
            placeholder = "Whats in your mind?" style = "width:50%"></textarea><br>
            <label class = "btn btn-warning" id = "upload_image_button" >Select Image
            <input type="file" name = "upload_image" size = "30">
            </label>
            <button id = "btn-post" class = "btn btn-success" name = "sub">Post</button>
            </form>
            <!--function for inserting posts-->
            <?php echo insert_posts(); ?>

            </center>
        </div>
</div>
<div class = "row">
    <div class = "col-md-12">
        <center><h2><strong>News Feed</strong></h2><br></center>
        <?php echo get_posts(); ?>
    </div>
        
</div>
    
</body>
</html>