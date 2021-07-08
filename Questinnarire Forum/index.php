<?php
    $php_username=$php_password=$php_ac_type='';
    $errors=array('username'=>'','password'=>'','ac_type'=>'');
    include('config/db_connect.php');
    $found='';
    if(isset($_POST['login'])){
        /*
        if(empty($_POST['username'])){
            $errors['username']="A username is required <br/>";
        }

        if(empty($_POST['password'])){
            $errors['password']="Password is a required field <br/>";
        }
        
        if(empty($_POST['ac_type'])){
            $errors['ac_type']="Type of account is a required field <br/>";
        }
        */

        if(!array_filter($errors)){

            $php_username=mysqli_real_escape_string($conn,$_POST['name']);
            $php_password=mysqli_real_escape_string($conn,$_POST['password']);
            $php_ac_type=mysqli_real_escape_string($conn,$_POST['ac_type']);

            $sql="SELECT * FROM login_info WHERE username='$php_username' ";

            $result=mysqli_query($conn,$sql);

            $user_login_info=mysqli_fetch_assoc($result);
            
            
            //echo "Username is : ";
            //echo ($user_login_info['username']);
            //print_r($user_login_info);
            
            if($php_username==$user_login_info['username'] && $php_password==$user_login_info['db_password'] && $php_ac_type==$user_login_info['ac_type']){
                $found=1;
                //header('Location: forum.php');
                //echo ("Welcome $php_username <br/>");

                /* Sessions for sending variable data to other page */
                session_start();
                $visited_again=1;
                $_SESSION['username']=$user_login_info['username'];
                header('Location: forum.php');
                //echo "session started and value saved <br/>";


            }else{
                $found=0;
                //header ('Location :index.php');
                //echo "Credientials didn't match ";
            }
            

            /*
            if(array_filter($user_login_info)){
                $found=1;
                //echo $user_login_info[0]["db_password"];
                //echo " is The password and details are :<br/>";

            }else{
                $found=0;
                //header('Location: forum.php');
            }
            */
        }
        
    }else{
        session_unset();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php');?>
    <section>
        <h3 class="center">SIGN IN</h3>
        <div class="tm-form">
            <div class="center red-text">
                <?php if($found===0): ?>
                    <?php echo "Credentials didn't match <br/>";?>
                <?php elseif($found===1):?>
                    <?php echo "Congratulations on successful login '$php_username'<br/>";?>
                <?php endif;?>
                    
            </div>
            <h4 class="center red-text">* Marked fields are important</h4>
            <form action="index.php" method="POST">
                <label>Username <span class="red-text fields"> *</span></label>
                <input type="text" name="name">
                <div class="red-text"><?php echo $errors['username']; ?></div></br>
                <br/><br/>
                <label >Password <span class="red-text fields"> *</span></label>
                <input type="password" name="password">
                <div class="red-text"><?php echo $errors['password']; ?></div>
                <br/><br/>
                <label>Account Type <span class="red-text fields"> *</span></label>
                <input type="radio" name="ac_type" value="admin">admin
                <input type="radio" name="ac_type" value="user">user
                <div class="red-text"><?php echo $errors['ac_type']; ?></div>
                <br/><br/>
                <div class="center login-button">
                    <input type="submit" name="login" value="LOG IN">
                </div>
            </form>
            <p>Don't have an account</p>
            <div class="pos-right">
                <a href="add.php" class="register-button">Register</a>
            </div>




        </div>

    </section>


    <?php include('templates/footer.php');?>
</html>
