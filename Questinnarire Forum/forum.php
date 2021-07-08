<?php
    //include('templates/header.php');
    //include('index.php');
    //echo "The value of found from index.php is ="$found;
    session_start();
    $forum_login_username=$_SESSION['username'];
    include('config/db_connect.php');
    $sql="SELECT * FROM login_info WHERE username='$forum_login_username' ";
    $result=mysqli_query($conn,$sql);
    $user_login_info=mysqli_fetch_assoc($result);
    $_SESSION['id']=$user_login_info['id'];


    /*
    if(isset($_POST['sub']) && isset($_POST['cmnt'])){
        $topicID=$user_login_info['id'];
        $sub=mysqli_real_escape_string($conn,$_POST['sub']);
        $cmnt=mysqli_real_escape_string($conn,$_POST['cmnt']);
        $sql2="INSERT INTO topics (id,sub,comment) VALUES ('$topicID','$sub','$cmnt')";
        $inserted=mysqli_query($conn,$sql2);
        //echo "HELLLOOOO <br/>";
        if(!$inserted){
            //echo "<br/>ERROR while submitting in topics ".mysqli_error($conn);
        }
    }
    
    $sql_read="SELECT * FROM topics";
    $result_read=mysqli_query($conn, $sql_read);
    $db_data= array();
    while($row=mysqli_fetch_assoc($result_read)){
        $db_data[]=$row;
    }
    //Returning the response in JSON format
    echo json_encode($db_data);
    */


    //To remove the session variable we use
    //session_unset();

    //print_r($user_login_info);



?>

<!DOCTYPE html>
<html lang="en">
    <?php include('header_forum.php');?>

    <br/>
    <br/>
    <button id="topicButton" class="topic grey-text">Add a Topic</button>      
    <div id="topic_content" class="tm-forum-form">
        <!--<p>Hellooooo <?php echo $user_login_info['username'];?></p>-->
        <form action="" method="POST">
            <label >Subject: </label>
            <input type="text" name="subject" class="" id="subject"><br/>
            <label >Comment: </label><br/>
            <textarea name="comment" id="comment" ></textarea><br/>
            <br/>
            <input type="submit" name="save-post" id="save-post" value="Save">
            <input type="submit" name="discard-post" id="discard-post" value="Discard" >
        </form>
        <!--
        <fieldset class="tm-topics">
            <legend> Topics</legend>
            <label for="">Subject</label>
            <input type="text" name="subject" id=""><br/><br/>
            <label for="">Comments</label>
            <input type="textarea" name="comment" id=""><br/>
            <br/>
        </fieldset>
        -->
    </div>

    <div id="showTopics">


        <!--
        <table>
            <tr>
                <th>Subject</th>
                <th>comment</th>
            
            
            </tr>
            <tbody id="data">
            
            </tbody>
        
        </table>
        -->

    
    
    
    
    </div>
    <!--
    <script src="https://a.opmnstr.com/app/js/api.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <!--<?php include('templates/footer.php');?>-->
    </body>
</html>

