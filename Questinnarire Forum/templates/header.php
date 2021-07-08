<?php 


    // session_start();
    // $forum_login_username=$_SESSION['username'];
    // include('config/db_connect.php');
    // $sql="SELECT * FROM login_info WHERE username='$forum_login_username' ";
    // $result=mysqli_query($conn,$sql);
    // $user_login_info=mysqli_fetch_assoc($result);

    

?>



<head>
    <title>PHP MySQL & AJAX</title>
    <link rel="stylesheet" type="text/css" href="templates/layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gelasio&family=Oranienbaum&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Esteban&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    
    
    </style>


</head>

<body>
    <nav>
        <div class="container">
            <a href="../index.php">Forum.com</a>
            <ul class="nav-mobile">
                <li class="grey-text">Hello Users<br/><?php //echo $user_login_info['username'];?></li>
                
            </ul>





        </div>




    </nav>