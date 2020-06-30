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
    
    <title>Messages</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "css/home_style2.css">
</head>
<style>
#scroll_messages{
    max-height:500px;
    overflow:scroll;
}
#btn-msg{
    width:20%;
    height:28px;
    border-radius:5px;
    margin:5px;
    border:none;
    color:#fff;
    float:right;
    background-color: lightpink;
}
#select_user{
    max-height:500px;
    overflow:scroll;
}
#green{
    background-color:lightgreen;
    border-color:grey;
    width:45%;
    padding:2.5px;
    font-size:16px;
    border-radius:3px;
    float:left;
    margin-bottom:5px;
}
#blue{
    background-color:pink;
    border-color:grey;
    width:45%;
    padding:2.5px;
    font-size:16px;
    border-radius:3px;
    float:right;
    margin-bottom:5px;
}
</style>

<body>
    <div class = "row">
    <?php

        if(isset($_GET['u_id'])){
            global $link;

            $get_id = $_GET['u_id'];
            $get_user = "select * from users where user_id = '$get_id'";
            $run_user = mysqli_query($link,$get_user);
            $row_user = mysqli_fetch_array($run_user);

            $user_to_msg = $row_user['user_id'];
            $user_to_name = $row_user['name'];
        }
        $user = $_SESSION['email'];
        $get_user = "select * from users where email = '$email'";
        $run_user = mysqli_query($link,$get_user);
        $row = mysqli_fetch_array($run_user);

        $user_from_msg = $row['user_id'];
        $user_from_name = $row['name'];


    ?>
    <div class = "col-md-3" id = "select_user">
        <?php

            $user = "select * from users";

            $run_user = mysqli_query($link,$user);

            while($row_user = mysqli_fetch_array($run_user)){
                $user_id = $row_user['user_id'];
                $user_name = $row_user['name'];
                $user_image = $row_user['user_image'];

                echo "
                <div class = 'container-fluid'>
                    <a style = 'text-decoration:none;cursor:pointer;color:#3897f0;' 
                    href = 'messages.php?u_id=$user_id'> 
                    <img class = 'img-circle' src = 'users/$user_image' width = '90px' 
                    height = '80px' title = '$user_name'> <strong>&nbsp $user_name</strong><br><br>
                    </a>
                </div>
                ";


            }
        ?>

    </div>
            <div class = "col-md-6">
                <div class = "load_msg" id = "scroll_messages">
                    <?php
                        $sel_msg = "select * from user_messages where (user_to = '$user_to_msg'
                        AND user_from = '$user_from_msg') OR (user_from = '$user_to_msg' 
                        AND user_to = '$user_from_msg') ORDER by 1 ASC";

                        $run_msg = mysqli_query($link,$sel_msg);
                        while($row_msg = mysqli_fetch_array($run_msg)){
                            $user_to = $row_msg['user_to'];
                            $user_from = $row_msg['user_from'];
                            $msg_body = $row_msg['msg_body'];
                            $msg_date = $row_msg['date'];
                    ?>
                    <div id = "loaded_msg">
                            <p><?php if($user_to == $user_to_msg AND $user_from == $user_from_msg){
                                echo "
                                    <div class = 'message' id = 'blue' data-toggle = 'tooltip' title = '$msg_date'>
                                    $msg_body</div><br><br><br>
                                ";
                            }else if($user_from == $user_to_msg AND $user_to == $user_from_msg){
                                echo "
                                <div class = 'message' id = 'green' data-toggle = 'tooltip' title = '$msg_date'>
                                $msg_body</div><br><br><br>                                
                                ";
                            }
                            ?></p>
                    </div>
                    <?php

                        }
                    ?>
                </div>
                <?php
                    if(isset($_GET['u_id'])){
                        $u_id = $_GET['u_id'];
                        if($u_id == "new"){
                            echo "
                                <form>
                                    <center><h3>Select to start convo</h3></center>
                                    <textarea disabled class = 'form-control' placeholder = 'message area'>
                                    </textarea>
                                    <input type = 'submit' class = 'btn btn-default' disabled value = 'Send'>
                                </form><br><br>
                            ";
                        }
                        else{
                            echo"
                            <form action = '' method = 'POST'>
                                <textarea class = 'form-control' placeholder = 'message area'
                                name = 'msg_box' id = 'message_textarea'></textarea>
                                <input type = 'submit' name = 'send_msg' id = 'btn_msg'
                                 value = 'Send'></form><br><br>
                            ";
    

                        }
                    }
                ?>
                <?php

                if(isset($_POST['send_msg'])){
                    $msg = htmlentities($_POST['msg_box']);

                    if($msg == ""){
                        echo "<h4 style = 'color:red;text-align:center;'>failed send!</h4>";
                    }else if(strlen($msg) > 50){
                        echo "<h4 style = 'color:red;text-align:center;'>character limit is 40!!</h4>";
                    }else{
                        $insert = "insert into user_messages(user_to,user_from,msg_body,date,msg_seen)
                        values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";

                        $run_insert =mysqli_query($link,$insert);
                    }
                }
                ?>
            </div>
            <div class = "col-md-3">
            <?php
            if(isset($_GET['u_id'])){
                global $link;
    
                $get_id = $_GET['u_id'];
                $get_user = "select * from users where user_id = '$get_id'";
                $run_user = mysqli_query($link,$get_user);
                $row = mysqli_fetch_array($run_user);

                $user_id = $row['user_id'];
                $user_name = $row['name'];
                $describe_user = $row['describe_user'];
                $user_country = $row['user_country'];
                $user_image = $row['user_image'];
                $register_date = $row['user_reg_date'];
                $gender = $row['user_gender'];                    
            }
            if($get_id == "new"){

            }else{
                echo "
                <div class = 'row'>
                    <div class = 'col-md-2'>
                    </div>
                    <center>
                    <div style = 'background-color:#e6e6e6;' class = 'col-md-9'>
                        <h2>Information About</h2>
                            <img src = 'users/$user_image' width = '150' height = '150' class = 'img-circle'><br><br>
                            <ul class = 'list-group'>
                                <li class = 'list-group-item' title = 'name'><strong>$user_name</strong></li>
                                <li class = 'list-group-item' title = 'user status'>
                                <strong style = 'color:grey;'>$describe_user</strong></li>
                                <li class = 'list-group-item' title = 'Gender'>$gender</li>
                                <li class = 'list-group-item' title = 'Country'>$user_country</li>
                                <li class = 'list-group-item' title = 'Registration Date'>$register_date</li> 
                                

                            </ul>
                    </div>
                    <div class = 'col-md-1'>
                    </div>
                </div>
                
                ";
            }
            ?>
            </div>
        
    </div>

    
</body>
</html>