<?php 
    include("includes/connect.php");     
  
?>
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
            <a href = "home.php" class = "navbar-brand">Hobnob</a>
        </div>
        <div class = "collapse navbar-collapse" id = "#bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav">
                <?php 
                    $user = $_SESSION['email'];
                    $get_user = "select * from users where email = '$user'";
                    $run_user = mysqli_query($link,$get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $name = $row['name'];
                    $describe_user = $row['describe_user'];
                    $Relationship_status = $row['Relationship'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $user_country = $row['user_country'];
                    $user_gender = $row['user_gender'];
                    $user_birthday = $row['user_birthday'];
                    $user_image = $row['user_image'];
                    $user_cover = $row['user_cover'];
                    $register_date = $row['user_reg_date'];

                    $user_posts = "select * from posts where user_id = '$user_id'";
                    $run_posts = mysqli_query($link,$user_posts);
                    $posts = mysqli_num_rows($run_posts);                    
                ?>

                <li><a href = 'profile.php?<?php echo "u_id = $user_id" ?>'><?php echo"$name"; ?></a></li>
                <li><a href = 'home.php'>Home</a></li>
                <li><a href = 'members.php'>Find people</a></li>
                <li><a href = 'messages.php?u_id=new'>Messages</a></li>
                
                    <li class = 'dropdown'>
                        <a href = '#' class = 'dropdown-toggle' data-toggle = 'dropdown' role = 'button'
                         aria-haspopup = 'true' aria-expanded = 'false'><span><i class = 'glyphicon glyphicon-chevron-down'>
                         </i></span></a>
                    <ul class = 'dropdown-menu'>
                        <li>
                            <a href = 'my_post.php?<?php echo "u_id=$user_id"; ?>'>My posts<span class = 'badge badge-secondary'><?php echo"$posts";?>
                            </span></a>
                        </li>
                        <li>
                            <a href = 'edit_profile.php?<?php echo "u_id=$user_id";?>'>Edit Account</a>
                        </li>
                        <!--<li role = 'separator' class = 'divider'></li>-->
                        <li>
                            <a href = 'logout.php'>Logout</a>
                        </li>
                    </ul>
                    </li>

            </ul>
            <ul class = "nav navbar-nav navbar-right">
                <li class = "dropdown">
                    <form class = "navbar-form navbar-left" method = "get" action = "results.php">
                        <div class = "form-group">
                            <input type = "text" class = "form-control" name = "user_query" placeholder = "Search">
                        </div>
                        <button type = "submit" class = "btn btn-info" name = "search">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>