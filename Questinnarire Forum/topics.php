<?php
    include('config/db_connect.php');

    session_start();
    $user_login_info=$_SESSION['id'];


    if(isset($_POST['sub']) && isset($_POST['cmnt'])){
        $topicID=$user_login_info;
        $sub=mysqli_real_escape_string($conn,$_POST['sub']);
        $cmnt=mysqli_real_escape_string($conn,$_POST['cmnt']);
        $sql2="INSERT INTO topics (id,sub,subComment) VALUES ('$topicID','$sub','$cmnt')";
        $inserted=mysqli_query($conn,$sql2);
        //echo "HELLLOOOO <br/>";
        if(!$inserted){
            echo "<br/>ERROR while submitting in topics ".mysqli_error($conn);
        }
    }
    
    $sql_read="SELECT * FROM topics";
    $result_read=mysqli_query($conn, $sql_read);
    $data= array();
    while($row=mysqli_fetch_assoc($result_read)){
        $data[]=$row;
    }
    //Returning the response in JSON format
    echo json_encode($data);
?>
