<?php
include("connect.php");

//searching people
function search_user(){
    global $link;

    if(isset($_GET['search_user_btn'])){
        $search_query = htmlentities($_GET['search_user']);
        $get_user =  "select * from users where name like '%$search_query%'";
    }
    else{
        $get_user = "select * from users";
    }
    $run_user = mysqli_query($link,$get_user);

    while ($row_user = mysqli_fetch_array($run_user)){

        $user_id = $row_user['user_id'];
        $name = $row_user['name'];

        echo"

            <div class = 'row'>
                <div class = 'col-md-3'>
                </div>
                    <div class = 'col-md-6'>
                        <div class = 'row' >
                            <div class = 'col-md-4'>
                                <a href = '#'>
                                
                                </a>
                            </div><br><br>
                                <div class = 'col-md-6'>
                                    <a style = 'text-decoration:none;cursor:pointer;color:#3897f0;
                                    ' href = '#'>
                                    <strong><h2>$name</h2></strong>
                                    </a>
                                </div>
                                <div class = 'col-md-3'>
                                <a href = 'remove_user.php?user_id=$user_id' style = 'float:right;'>
                                    <button class = 'btn btn-danger' name = 'remove_user'>Remove</button></a>

                                </div>
                            </div>
                        </div>
                        <div class = 'col-md-4'>
                        </div>
                    </div><br>
        ";
    }
    include("remove_user.php");
    
}
//function to get post
function get_posts(){

    global $link;
    $per_page = 300;

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    $start_from = ($page-1) * $per_page;

    $get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

    $run_posts = mysqli_query($link, $get_posts);

    while($row_posts = mysqli_fetch_array($run_posts)){
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $content = substr($row_posts['post_content'], 0, 40);
        $upload_image = $row_posts['upload_image'];
        $post_date = $row_posts['post_date'];

        $user = "select * from users where user_id = '$user_id' AND posts = 'yes'";
        $run_user = mysqli_query($link,$user);
        $row_user = mysqli_fetch_array($run_user);

        $user_name = $row_user['name'];

        //display post
         if($content == "No" && strlen($upload_image) >= 1){
             echo "
                <div class = 'row'>
                    <div class = 'col-md-3'>
                    </div>
                    <div id = 'posts' class = 'col-md-6'>
                        <div class = 'row'>
                            <div class = 'col-md-2'>

                            </div>
                            <div class = 'col-md-6'>
                            <h3><a style = 'text-decoration:none;cursor:pointer;color:#3897f0;' 
                                        >$user_name</h3>
                                 <h4><small style = 'color:black;'>Updated on<strong></strong>$post_date</small></h4>
                            </div>
                            <div class = 'col-md-4'>
                            </div>
                        </div>
                        <div class = 'row'>
                            <div class = 'col-md-12'>
                                <img id = 'posts-img' src = '../imagepost/$upload_image' style = 'height:350px;'>
                            </div>
                        </div><br>
                        <a href = 'remove_post.php?post_id=$post_id' style = 'float:right;'>
                        <button class = 'btn btn-danger'>Remove</button></a><br>
                    </div>
                    <div class = 'col-md-3'>
                    </div>
                </div><br><br>
             ";
         }
         else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
             echo "
            <div class = 'row'>
            <div class = 'col-md-3'>
            </div>
            <div id = 'posts' class = 'col-md-6'>
                <div class = 'row'>
                    <div class = 'col-md-2'>

                    </div>
                    <div class = 'col-md-6'>
                    <h3 style = 'text-decoration:none;cursor:pointer;color:#3897f0;'>$user_name</h3>
                    <h4><small style = 'color:black;'>Updated on<strong></strong>$post_date</small></h4>
                    </div>
                    <div class = 'col-md-4'>
                    </div>
                </div>
                <div class = 'row'>
                    <div class = 'col-md-12'>
                        <p>$content</p>
                        <img id = 'posts-img' src = '../imagepost/$upload_image' style = 'height:350px;'>
                    </div>
                </div><br>
                <a href = 'remove_post.php?post_id=$post_id' style = 'float:right;'>
                <button class = 'btn btn-danger'>Remove</button></a><br>
            </div>
            <div class = 'col-md-3'>
            </div>
        </div><br><br>
     ";

         }
         else {
             echo "
            <div class = 'row'>
            <div class = 'col-md-3'>
            </div>
            <div id = 'posts' class = 'col-md-6'>
                <div class = 'row'>
                    <div class = 'col-md-2'>

                    </div>
                    <div class = 'col-md-6'>
                    <h3 style = 'text-decoration:none;cursor:pointer;color:#3897f0;'>$user_name</h3>
                    <h4><small style = 'color:black;'>Updated on<strong></strong>$post_date</small></h4>
                    </div>
                    <div class = 'col-md-4'>
                    </div>
                </div>
                <div class = 'row'>
                    <div class = 'col-md-12'>
                    <h3><p>$content</p></h3>
                    </div>
                </div><br>
                <a href = 'remove_post.php?post_id=$post_id' style = 'float:right;'>
                <button class = 'btn btn-danger'>Remove</button></a><br>
            </div>
            <div class = 'col-md-3'>
            </div>
        </div><br><br>
     ";
         }
    }
}


    

    
?>  
