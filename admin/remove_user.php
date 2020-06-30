<?php

$link = mysqli_connect('localhost','root','','hobnob');


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $delete_user = "delete from users where user_id = '$user_id'";

    $run_delete = mysqli_query($link,$delete_user);

    if($run_delete){
        echo "<script>alert('User Removed')</script>";
        echo "<script>window.open('admin_members.php','_self')</script>";
    }
}

?>