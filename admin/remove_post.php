<?php

$link = mysqli_connect('localhost','root','','hobnob');


if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $delete_post = "delete from posts where post_id = '$post_id'";

    $run_delete = mysqli_query($link,$delete_post);

    if($run_delete){
        echo "<script>alert('Post Removed')</script>";
        echo "<script>window.open('admin_posts.php','_self')</script>";
    }
}

?>