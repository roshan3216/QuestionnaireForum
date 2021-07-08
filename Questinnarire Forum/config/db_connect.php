<?php

$conn=mysqli_connect('localhost','admin_roshan','password','registered_users',8889);

if(!$conn){
    echo "Connection Error : ".mysqli_connnect_error();

}

?>