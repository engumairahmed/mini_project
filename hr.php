<?php
require_once('header.php');
$role=$_SESSION["auth_user"]["role"];
if($role!=3){
    echo '<script type="text/javascript">
        window.location = "login.php";
        </script> ';
};
$query="SELECT * FROM users WHERE role!=3";
$res=mysqli_query($conn,$query);
if(isset($_GET["email"])){
    $email=$_GET["email"];
    $query="SELECT * FROM users WHERE email='$email'";
    $res=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($res);
    if($row["role"]==1){
        $query="UPDATE `users` SET `role` = '2' WHERE `users`.`email` = '$email';";
        mysqli_query($conn,$query);
    } else{
        $query="UPDATE `users` SET `role` = '1' WHERE `users`.`email` = '$email';";
        mysqli_query($conn,$query);
    };
    echo '<script type="text/javascript">
        window.location = "hr.php";
        </script> ';
} else if(isset($_GET["id"])){
    $id=$_GET["id"];
    $query="SELECT * FROM users WHERE id=$id";    
    $res=mysqli_query($conn,$query);    
    $row=mysqli_fetch_assoc($res);
    if($row["status"]==4){
        $query="UPDATE `users` SET `status` = '3' WHERE `users`.`id` = '$id';";
        mysqli_query($conn,$query);
    } else{
        $query="UPDATE `users` SET `status` = '4' WHERE `users`.`id` = '$id';";
        mysqli_query($conn,$query);
    };
    echo '<script type="text/javascript">
        window.location = "hr.php";
        </script> ';
};
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Welcome</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>E-Mail</th>
                                            <th>Role</th>
                                            <th>Switch Role</th>
                                            <th>Change Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        while($row=mysqli_fetch_assoc($res)){
                                            echo '
                                            <tr>
                                                <th>'.$row["id"].'</th>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["email"].'</td>
                                                <td>';
                                                if($row["role"]=="1"){
                                                    echo "User";
                                                } else{
                                                    echo "Admin";
                                                };
                                            echo '</td>';
                                            if($row["role"]=="1"){
                                                echo '<td><a class="btn btn-danger" href="hr.php?email='.$row["email"].'">Make Admin</a></td>';
                                            } else{
                                                echo '<td><a class="btn btn-warning" href="hr.php?email='.$row["email"].'">Make User</a></td>';
                                            };
                                            if($row["status"]=="4"){
                                                echo '<td><a class="btn btn-primary" href="hr.php?id='.$row["id"].'">Activate</a></td>';
                                            } else{
                                                echo '<td><a class="btn btn-danger" href="hr.php?id='.$row["id"].'">Disable</a></td>';
                                            };
                                            echo'</tr>
                                        ';
                                        };

                                        ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

    </div>
            <!-- End of Main Content -->

<?php

require_once "footer.php"

?>
