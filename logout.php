<?php
session_start();
if(isset($_SESSION["auth_admin"])){
    session_destroy();
    header("location:login.php");
} else{
    header("location:login.php");
};

?>