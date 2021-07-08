<?php

    include('config/db_connect.php');
    //session_start();
    $forum_login_username=$_SESSION['username'];
    
    $sql="SELECT * FROM login_info WHERE username='$forum_login_username' ";
    $result=mysqli_query($conn,$sql);
    $user_login_info=mysqli_fetch_assoc($result);






?>




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Post</title>
    <link rel="stylesheet" type="text/css" href="templates/layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gelasio&family=Oranienbaum&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Esteban&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>



<body>
    
    <nav>
        <div class="container">
            <a href="../index.php">Forum.com</a>
            <ul class="nav-mobile">
                <li class="grey-text">Hello <?php echo $user_login_info['username'];?></li>
                <li class="grey-text log-out"><a href="index.php" class="grey-text log-out" id="log_out">Log Out</a></li>
            </ul>
            





        </div>




    </nav>

  
