<?php
require_once "header.php";
$query="SELECT * FROM hotels h INNER JOIN classes c ON h.htl_room_type=c.class_id INNER JOIN rating r ON h.htl_rating=r.rt_id;";
$res=mysqli_query($conn,$query);

if(isset($_GET["did"])){
    $id=$_GET["did"];   
  $delete="DELETE FROM `slider` WHERE sli_id=$id";
    $query="SELECT * FROM slider WHERE sli_id=$id";
  $path=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($path);

    file_exists('front/'.$row["sli_image"]);
  unlink('front/'.$row["sli_image"]);
  mysqli_query($conn,$delete);
  
  echo '<script type="text/javascript">
        window.location = "slider.php";
        </script> ';    
  };

  if(isset($_GET["uid"])){
    $uid=$_GET["uid"];
    $query="SELECT * FROM slider WHERE sli_id=$uid";
    $res=mysqli_query($conn,$query);
    $dt=mysqli_fetch_assoc($res);
};

if(isset($_POST["updSlide"])){
    $name=$_POST["upd_name"];
    $heading=$_POST["upd_heading"];
    $parag=$_POST["upd_parag"];
    $imgName=$_FILES["upd_image"]["name"];
    $tmpfile=$_FILES["upd_image"]["tmp_name"];
    $path='assets/img/'.time().$imgName;
    $imgPath='front/'.$path;
    $uid=$_GET["uid"];
    $xt=explode('.',$imgName);
    $type=end($xt);
    $ext=array('jpg','jpeg','png','jfif');

    $query="UPDATE `slider` SET `sli_name`='$name',`sli_image`='$path',`sli_heading`='$heading',`sli_parag`='$parag' WHERE sli_id=$uid";

    if(in_array($type,$ext)){
    
        mysqli_query($conn,$query);        
        move_uploaded_file($tmpfile,$imgPath);
        echo '<script type="text/javascript">
        window.location = "slider.php";
        </script> ';
    }else{
        echo "<script>alert('Invalid File Type.!')</script>";
    };
};

if(isset($_POST["AddHotel"])){
    $name=$_POST["hotelName"];
    $rooms=$_POST["rooms"];
    $city=$_POST["city"];
    $rating=$_POST["rating"];
    $vacRooms=$_POST["vacRooms"];
    $roomClass=$_POST["roomClass"];
    $charges=$_POST["charges"];
    // print_r($_POST);
    if($roomClass==="0"){
        echo "<script>alert('Select Room Class!')</script>";
    } else{
    $query="INSERT INTO hotels VALUES (NULL,'$name','$city',$rating,$rooms,$vacRooms,$roomClass,$charges)";
    mysqli_query($conn,$query);
    };
};

?>

        <div class="container"> 
            <?php
            $query="SELECT * FROM hotels h INNER JOIN classes c ON h.htl_room_type=c.class_id INNER JOIN rating r ON h.htl_rating=r.rt_id INNER JOIN slider s ON h.htl_image=s.sli_id;";
            $res=mysqli_query($conn,$query);
            if(isset($_GET["uid"])){
                echo '<h1 class="h3 mb-2 text-gray-800">Add Hotel</h1>
                <form class="user" method="post">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="name" value="" name="hotelName" class="form-control"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Hotel Name">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="name" name="city" class="form-control"
                                    id="exampleInputPassword" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select name="rating" id="" class="py-2 form-control" placeholder="Select Role">
                                    <option selected value=0>Select Hotel Rating</option>
                                        <option value="'.$row["rt_id"].'">'.$row["rt_rating"].'</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select name="roomClass" id="" class="py-2 form-control" placeholder="Select Role">
                                    <option selected value=0>Select Room Type</option>
                                    <option value="'.$row["class_id"].'">'.$row["class"].'</option>                                                          
                                </select>
                            </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="name" name="rooms" class="form-control"
                                        id="exampleInputPassword" placeholder="Total Rooms">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="name" name="vacRooms" class="form-control"
                                        id="exampleInputPassword" placeholder="Vacant rooms">
                                </div>
                            </div> 
                            <div class="form-group row">                      
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="charges" class="form-control"
                                        id="exampleInputPassword" placeholder="Charges">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="charges" class="form-control"
                                        id="exampleInputPassword" placeholder="Charges">
                                </div>
                            </div>
                            <input type="submit" name="hotelAdd" class="btn btn-dark" value="Add">                                        
                            <hr>
                                            
                </form>';
            } else{
                echo '<h1 class="h3 mb-2 text-gray-800">Add Hotel</h1>
                <form class="user" method="post">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="name" name="hotelName" class="form-control"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Hotel Name">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="name" name="city" class="form-control"
                                    id="exampleInputPassword" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select name="rating" id="" class="py-2 form-control" placeholder="Select Role">
                                    <option selected value=0>Select Hotel Rating</option>
                                        ';
                                            $query="SELECT * FROM rating";
                                            $res=mysqli_query($conn,$query);
                                            while($row=mysqli_fetch_assoc($res)){
                                            echo '<option value="'.$row["rt_id"].'">'.$row["rt_rating"].'</option>';
                                            };
                                       echo '                
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select name="roomClass" id="" class="py-2 form-control" placeholder="Select Role">
                                    <option selected value=0>Select Room Type</option>
                                        ';
                                            $query="SELECT * FROM classes";
                                            $res=mysqli_query($conn,$query);
                                            while($row=mysqli_fetch_assoc($res)){
                                            echo '<option value="'.$row["class_id"].'">'.$row["class"].'</option>';
                                            };
                                        echo '                
                                </select>
                            </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="name" name="rooms" class="form-control"
                                        id="exampleInputPassword" placeholder="Total Rooms">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="name" name="vacRooms" class="form-control"
                                        id="exampleInputPassword" placeholder="Vacant rooms">
                                </div>
                            </div> 
                            <div class="form-group row">                      
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="charges" class="form-control"
                                        id="exampleInputPassword" placeholder="Charges">
                                </div>
                            </div>
                            <input type="submit" name="hotelAdd" class="btn btn-dark" value="Add">                                        
                            <hr>
                                            
                </form>';
            };
            
            ?>       
        </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">View Hotels</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Hotel</th>
                                            <th>Rooms</th>
                                            <th>Vacant Rooms</th>
                                            <th>Room Type</th>
                                            <th>Charges</th>
                                            <th>Rating</th>
                                            <th>City</th>
                                            <th>Image</th>
                                            <th>Delet</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php
                                        $query="SELECT * FROM hotels h INNER JOIN classes c ON h.htl_room_type=c.class_id INNER JOIN rating r ON h.htl_rating=r.rt_id INNER JOIN slider s ON h.htl_image=s.sli_id;";
                                        $res=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($res)){
                                            echo   '<tr><th>'.$row["htl_name"].'</th>
                                                    <th>'.$row["htl_rooms"].'</th>
                                                    <th>'.$row["htl_vacant_rooms"].'</th>
                                                    <th>'.$row["class"].'</th>
                                                    <th>'.$row["htl_room_charges"].'</th>
                                                    <th>'.$row["rt_rating"].'</th>
                                                    <th>'.$row["htl_city"].'</th>
                                                    <th><img src="front/'.$row["sli_image"].'" width=100px></td>           
           <th><a class="btn btn-danger" href="hotels.php?did='.$row["htl_id"].'">Delete</a></th>
           <th><a class="btn btn-warning" href="hotels.php?uid='.$row["htl_id"].'&path='.$row["sli_image"].'">Update</a></th>
                                                    </tr>';
                                            };
                                        ?>
                                    </tbody>
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