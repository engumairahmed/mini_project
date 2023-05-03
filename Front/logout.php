<?php
session_start();
if(isset($_SESSION["auth_user"])){
    session_destroy();
    header("location:index.php");
} else{
    header("location:index.php");
};

?>