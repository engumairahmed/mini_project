<?php
$conn=mysqli_connect("localhost","root","","db_ktg");
session_start();
session_destroy();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $query="SELECT * FROM users where email='$email'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)){
        $row=mysqli_fetch_assoc($res);
        if(password_verify($pass,$row["password"])){
            if($row["status"]!="4"){
                if($row["role"]=="1"){
                    session_start();
                    header("location:front/index.php");
                    $_SESSION["auth_user"]=$row;
                    } else if($row["role"]=="2"){
                        session_start();
                        header("location:admin.php"); 
                        $_SESSION["auth_admin"]=$row;
                    }else if($row["role"]=="3"){
                        session_start();
                        header("location:HR.php"); 
                        $_SESSION["auth_admin"]=$row;
                    };
            } else{
                echo "<script>alert('Account Disabled please contact HR')</script>";
            };
        } else{
            echo "<script>alert('Wrong password')</script>";
        };
    } else{
        echo "<script>alert('No user registered with $email')</script>";
    };

};



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to KTG!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-dark btn-user btn-block" value="Login">                                        
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>