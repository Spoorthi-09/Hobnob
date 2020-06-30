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
        <?php
            if(isset($_GET['u_id'])){
                $u_id = $_GET['u_id'];
            }
            if($u_id < 0 || $u_id == ""){
                echo "<script>window.open('home.php','_self')</script>";
            }else{
        ?>

        <div class = "col-md-12">
            <?php
                if(isset($_GET['u_id'])){
                    global $link;

                    $user_id = $_GET['u_id'];

                    $select = "select * from users where user_id = '$user_id'";
                    $run = mysqli_query($link,$select);
                    $row = mysqli_fetch_array($run);

                    $name = $row['name'];
                }
            ?>
            <?php
                if(isset($_GET['u_id'])){
                    global $link;
                    $user_id = $_GET['u_id'];

                    $select = "select * from users where user_id = '$user_id'";
                    $run = mysqli_query($link,$select);
                    $row = mysqli_fetch_array($run);

                    $id = $row['user_id'];
                    $image = $row['user_image'];
                    $name = $row['name'];
                    $describe_user = $row['describe_user'];
                    $country = $row['user_country'];
                    $gender = $row['user_gender'];
                    $register_date = $row['user_reg_date'];

                    echo "
                    <div class = 'row'>
                        <div class = 'col-md-1'>
                        </div>
                        <center>
                            <div style = 'background-color:#e6e6e6;' class = 'col-md-3'>
                            <h2>Information about</h2>
                            <img class = 'img-circle' src = 'users/$image' width = '150' height = '150'>
                            <br><br>
                            <ul class = 'list-group'>
                                <li class = 'list-group-item' title = 'username'><strong>$name</strong></li>
                                <li class = 'list-group-item' title = 'User Status'>
                                <strong style = 'color:grey;'>$describe_user</strong></li>
                                <li class = 'list-group-item' title = 'Gender'><strong>$gender</strong></li>
                                <li class = 'list-group-item' title = 'Country'><strong>$user_country</strong></li>
                                <li class = 'list-group-item' title = 'Registration Date'><strong>$register_date</strong></li>                                
                            </ul>                    
                    ";
                    $user = $_SESSION['email'];
                    $get_user = "select * from users where email = '$user'";
                    $run_user = mysqli_query($link,$get_user);
                    $row = mysqli_fetch_array($run_user);

                    $userown_id = $row['user_id'];

                    if($user_id == $userown_id){
                        echo "<a href = 'edit_profile.php?u_id=$userown_id' class = 'btn btn-success'/ >
                            Edit Profile</a><br><br><br>";
                    }
                    echo "
                    </div>
                    </center>
                    ";
                }
            ?>
            <div class = "col-md-8">
                <center><h1><strong><?php echo "$name"; ?></strong> Posts</h1></center>
                <?php
                global $link;

                if(isset($_GET['u_id'])){
                    $u_id = $_GET['u_id'];
                }

                $get_posts = "select * from posts where user_id = '$u_id' ORDER by 1 DESC LIMIT 5";

                $run_posts = mysqli_query($link,$get_posts);
                
                while($row_posts = mysqli_fetch_array($run_posts)){

                    $post_id = $row_posts['post_id'];
                    $user_id = $row_posts['user_id'];
                    $content = $row_posts['post_content'];
                    $upload_image = $row_posts['upload_image'];
                    $post_date = $row_posts['post_date'];

                    $user = "select * from users user_id = '$user_id' AND posts = 'yes'";
                    $run_user = mysqli_query($link,$user);
                    //$row_user = mysqli_fetch_array($run_user);

                    if($content == "No" && strlen($upload_image) >= 1){
                        echo "
                        <div class = 'own_posts'>
                            <div class = 'row'>
                                <div class = 'col-md-2'>
                                </div>
                                <div class = 'col-md-6'>
                                     <h4><small style = 'color:black;'>Updated a 
                                     post on <strong> $post_date</strong></small></h4>
                                </div>
                                <div class = 'col-md-4'>

                                </div>
                            </div>
                            <div class = 'row'>
                                <div class = 'col-md-12'>
                                    <img id = 'post-img' src = 'imagepost/$upload_image' style = 'height:350px;'>
                                </div>
                            </div><br>
                            <a href = 'single.php?post_id=$post_id' style = 'float:right;'>
                                    <button class = 'btn btn-success'>View</button></a>
                                    <a href = 'functions/delete_post.php?post_id=$post_id' style = 'float:right;'>
                                    <button class = 'btn btn-danger'>Delete</button></a>
                        </div><br><br>
                        
                        ";
                    }
                    else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
                        echo "
                            <div id = 'own_posts'>
                                <div class = 'row'>
                                    <div class = 'col-md-2'>


                                    </div>
                                    <div class = 'col-md-6'>

                                    </div>
                                    <div class = 'col-md-4'>
                                    </div>
                                </div>
                                    <div class = 'row'>
                                        <div class = 'col-md-12'>
                                        <p>$content</p>
                                        <img id = 'posts-img' src = 'imagepost/$upload_image' style = 'height:350px;'>                                        </div>
                                    </div><br>
                                    <a href = 'single.php?post_id=$post_id' style = 'float:right;'>
                                    <button class = 'btn btn-success'>View</button></a>
                                    <a href = 'functions/delete_post.php?post_id=$post_id' style = 'float:right;'>
                                    <button class = 'btn btn-danger'>Delete</button></a>

                            </div><br><br>
                        ";
                    }
                    else {
                        echo "
                            <div id = 'own_posts'>
                                <div class = 'row'>
                                    <div class = 'col-md-2'>


                                    </div>
                                    <div class = 'col-md-6'>

                                    </div>
                                    <div class = 'col-md-4'>
                                    </div>
                                </div>
                                    <div class = 'row'>
                                        <div class = 'col-md-12'>
                                        <p><h3>$content</h3></p>
                                    </div><br>
                                    <a href = 'single.php?post_id=$post_id' style = 'float:right;'>
                                    <button class = 'btn btn-success'>View</button></a>
                                    <a href = 'functions/delete_post.php?post_id=$post_id' style = 'float:right;'>
                                    <button class = 'btn btn-danger'>Delete</button></a>
                                    </div>
                            </div><br><br>
                        ";
                    }

                }

                ?>

            </div>
        </div>
    </div>
            <?php }?>
    
</body>
</html>