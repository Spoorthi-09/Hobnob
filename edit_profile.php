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

    <title>Edit Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "css/home_style2.css">
</head>

<body>
    <div class = "row">
        <div class = "col-md-2">
        </div>
        <div class = "col-md-8">
            <form action = "" method = "post" enctype = "multipart/form-data">
            <table class = "table table-bordered table-hover">
                <tr align = "center">
                    <td colspan = "6" class = "active"><h2>Edit your profile</h2></td>
                </tr>
                <tr>
                    <td style = "font-weight:bold;">Chnage your name</td>
                    <td>
                        <input class = "form-control" type = "text" name = "u_name" required value = "<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td style = "font-weight:bold;">Description</td>
                    <td>
                        <input class = "form-control" type = "text" name = "describe_user" required value = "<?php echo $describe_user; ?>">
                    </td>
                </tr>
                <tr>
                    <td style = "font-weight:bold;">Relationship status</td>
                    <td>
                    <input class = "form-control" type = "text" name = "Relationship" required value = "<?php echo $Relationship_status; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td style = "font-weight:bold;">Email</td>
                    <td>
                        <input class = "form-control" type = "email" name = "u_email" required value = "<?php echo $email; ?>">
                    </td>
                </tr>
                <!--<tr>
                    <td style = "font-weight:bold;">Password</td>
                    <td>
                        <input class = "form-control" type = "password" name = "u_pass" id = "mypass" required value = "<?php echo $password; ?>">
                    </td>
                </tr>-->
                <tr>
                    <td style = "font-weight:bold;">Country</td>
                    <td>
                        <input class = "form-control" type = "text" name = "u_country" required value = "<?php echo $user_country; ?>">
                    </td>
                </tr>
                <tr>
                    <td style = "font-weight:bold;">Gender</td>
                    <td>
                        <input class = "form-control" type = "text" name = "u_gender" required value = "<?php echo $user_gender; ?>">
                    </td>
                </tr>
                <tr>
                    <td style = "font-weight:bold;">Date Of Birth</td>
                    <td>
                        <input class = "form-control input-md" type = "date" name = "u_birthday" required value = "<?php echo $user_birthday; ?>">
                    </td>
                </tr>
                <tr>
                    <!--<td tyle = "font-weight:bold;">Forgotten Password</td>
                    <td> 
                        <button type = "button" class = "btn btn-default" data_toggle = "model"
                        data-target = "#myModal">Turn On</button>
                        <div id = "myModal" class = "modal fade" role = "dialog">
                            <div class = "modal-dialog">
                                <div class = "modal-content">
                                    <div class = "modal-header">
                                        <button type = "button" class = "close" data-dismiss = "modal">&times</button>
                                            <h4 class = "modal-title">Modal Header</h4>
                                    </div>
                                    <div class = "modal-body">
                                        <form action = "recovery.php?id=<?php //echo $user_id; ?>" method = "post" id = "f">
                                            <strong>What is your fav place?</strong>
                                            <textarea class = "form-control" cols = "83" rows = "2" name = "content"
                                            placeholder = "place"></textarea><br>
                                            <input class = "btn btn-default" type="submit" name ="sub" value = "Submit" style = "width:100px;"><br><br>
                                            <pre>Answer the above qusetion if password forgotten.</pre>
                                            <br><br>
                                            
                                        </from>
                                    </div>
                                    <div class ="modal-footer">
                                        <button type = "button" class = "btn btn-default"
                                        data-dismiss = "modal">Close</button>
                                    </div>
                                <div>
                            </div>
                        </div>
                    </td>-->
                </tr>
                <tr align = "center">
                    <td colspan = "6">
                    <input type = "submit" class = "btn btn-info" name = "update" style = "width:250px;" value = "Update">
                    </td>
                </tr>

            </table>
            </form>
        </div>
        <div class = "col-md-2">
        </div>
        
    </div>
    
</body>
</html>
<?php

if(isset($_POST['update'])){
    $u_name = htmlentities($_POST['u_name']);
    $describe_user = htmlentities($_POST['describe_user']);
    $Relationship_status = htmlentities($_POST['Relationship']);
    $u_email = htmlentities($_POST['u_email']);
    $u_country = htmlentities($_POST['u_country']);
    $u_gender = htmlentities($_POST['u_gender']);
    $u_birthday = htmlentities($_POST['u_birthday']);

    $update = "update users set name = '$name' , describe_user = '$describe_user' ,
    Relationship = '$Relationship_status' , email = '$u_email' , user_country = '$u_country' ,
    user_gender = '$u_gender' , user_birthday = '$u_birthday' where user_id = '$user_id'";

    $run = mysqli_query($link,$update);

    if($run){
        echo "<script>alert('Updated profile.')</script>";
        echo "<script>window.open('edit_profile.php?u_id=$user_id','_self'</script>";
    }



}
?>