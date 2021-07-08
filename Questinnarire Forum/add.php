<?php
    $firstName=$lastName=$username=$email=$password=$gender=$c_password=$ac_type=$dob='';
    $errors=array('firstName'=>'','lastName'=>'','username'=>'','email'=>'','password'=>'','c_password'=>'','gender'=>'','ac_type'=>'','dob'=>'');
    include('config/db_connect.php');
    if( isset($_POST['submit'])){
        if(empty($_POST['firstName'])){
            $errors['firstName']="First name is a required field <br/>";
        }else{
            $firstName=$_POST['firstName'];
            //echo $firstName.'<br/>';
            if(!preg_match('/^[a-zA-Z]*$/',$firstName)){
                $errors['firstName']= "First name should consist of letters only <br/>";
            }
        }

        if(empty($_POST['lastName'])){
            $errors['lastName']="Last name is a required field <br/>";
        }else{
            $lastName=$_POST['lastName'];
            //echo $lastName.'<br/>';
            if(!preg_match('/^[a-zA-Z]*$/',$lastName)){
                $errors['lastName']= "Last name should consist of letters <br/>";
            }
        }

        if(empty($_POST['username'])){
            $errors['username']="A username is required <br/>";
        }else{
            $username=$_POST['username'];
            //echo $username.'<br/>';
            if(!preg_match('/^[a-zA-Z0-9_\s]+$/',$username)){
                $errors['username']= "Username must be letters, numbers and underscore <br/>";
            }
        }

        if(empty($_POST['email'])){
            $errors['email']="An email is required <br/>";
        }else{
            $email=$_POST['email'];
            //echo $email.'<br/>';
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['email']="Email should be a valid email address <br/>";
            }
        }

        if(empty($_POST['password'])||$_POST['password']!=$_POST['c_password']){
            if($_POST['password']!=$_POST['c_password']){
                $errors['password']="Password didn't match <br/>";
            }else{
                $errors['password']="Password is a required field <br/>";
            }
        }else{
            $password=$_POST['password'];
            //echo $password.'<br/>';
            if(!preg_match('^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',$password)){
                $errors['password']= "Password should contain atlest one number,letters <br/>";
            }
        
        }

        if(empty($_POST['dob'])){
            $errors['dob']="Date of birth is a required field <br/>";
        }else{
            $dob=$_POST['dob'];
            //echo $dob.'<br/>';
        }

        if(empty($_POST['gender'])){
            $errors['gender']="Gender is a required field <br/>";
        }else{
            $gender=$_POST['gender'];
            //echo $gender.'<br/>';
        }
        
        if(empty($_POST['ac_type'])){
            $errors['ac_type']="Type of account is a required field <br/>";
        }else{
            $ac_type=$_POST['ac_type'];
            //echo $ac_type.'<br/>';
        }

        if(array_filter($errors)){
            //echo "Errors in the form <br/>";
        }else{
            $email=mysqli_real_escape_string($conn,$_POST['email']);
            $username=mysqli_real_escape_string($conn,$_POST['username']);
            $firstName=mysqli_real_escape_string($conn,$_POST['firstName']);
            $lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
            $ac_type=mysqli_real_escape_string($conn,$_POST['ac_type']);                
            $dob=mysqli_real_escape_string($conn,$_POST['dob']);
            $gender=mysqli_real_escape_string($conn,$_POST['gender']);
            $password=mysqli_real_escape_string($conn,$_POST['password']);
        }

        //echo "Outside of all ifs gender= ".$gender."<br/>";
        //sending the data to the database
        $sql= "INSERT INTO login_info(username,email,db_password,firstName,lastName,dob,gender,ac_type) VALUES ('$username','$email','$password','$firstName','$lastName','$dob','$gender','$ac_type')";
        //save to the database
        if(mysqli_query($conn,$sql)){
            //success
            header('Location: forum.php');
            //location to the page we want to redirect to i.e. forum post page
            
        }else{
            //echo 'Query error '.mysqli_error($conn)."<br/>";
           
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <?php include("templates/header.php");?>

    <section>
        
        <div class="tm-form">
            <h2 class="center">Register</h2>
            <h4 class="center red-text">* Marked fields are important</h4>
            <form action="add.php" method="POST" class="tag-form">
                <label >First Name <span class="red-text fields"> *</span> </label>
                <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName) ?>">
                <div class="red-text"><?php echo $errors['firstName']; ?></div></br>
                <label >Last Name <span class="red-text fields"> *</span></label>
                <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName) ?>">
                <div class="red-text"><?php echo $errors['lastName']; ?></div></br>
                <label>Username <span class="red-text fields"> *</span></label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
                <div class="red-text"><?php echo $errors['username']; ?></div></br>
                <label >Email <span class="red-text fields"> *</span></label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
                <div class="red-text"><?php echo $errors['email']; ?></div></br>
                <label >Password <span class="red-text fields"> *</span></label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($password);?>">
                <br></br>
                <label >Confirm Password <span class="red-text fields"> *</span></label>
                <input type="password" name="c_password" value="<?php echo htmlspecialchars($c_password);?>">
                <div class="red-text"><?php echo $errors['password']; ?></div>
                <br></br>
                <label>Date of Birth : <span class="red-text fields"> *</span></label>
                <input type="date" name="dob" value="<?php echo htmlspecialchars($dob);?>">
                <br></br>
                <label>Gender : <span class="red-text fields"> *</span></label>
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="Others">Others
                <div class="red-text"><?php echo $errors['gender']; ?></div>
                <br></br>
                <label >Account type : <span class="red-text fields"> *</span></label>
                <input type="radio" name="ac_type" value="admin">admin
                <input type="radio" name="ac_type" value="user">user
                <div class="red-text"><?php echo $errors['ac_type']; ?></div>
                <br></br>
                <div class="center">
                    <input type="submit" name="submit" value="submit">
                </div>
            </form>

        </div>

    </section>






    <?php include("templates/footer.php");?>
</html>