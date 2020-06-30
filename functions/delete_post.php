<?php

//define('DB_SERVER','localhost');
//define('DB_USERNAME','root');
//define("DB_PASSWORD",'');
//define("DB_DATABASE",'hobnob');

$link = mysqli_connect('localhost','root','','hobnob');


if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $delete_post = "delete from posts where post_id = '$post_id'";

    $run_delete = mysqli_query($link,$delete_post);

    if($run_delete){
        echo "<script>alert('Post Deleted')</script>";
        echo "<script>window.open('../home.php','_self')</script>";
    }
}
?>
