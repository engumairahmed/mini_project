<?php
require_once "header.php";
$query="SELECT * FROM hotels h INNER JOIN classes c ON h.htl_room_type=c.class_id INNER JOIN rating r ON h.htl_rating=r.rt_id;";
$res=mysqli_query($conn,$query);

if(isset($_GET["did"])){
  $id=$_GET["did"];   
  $delete="DELETE FROM `hotels` WHERE htl_id=$id";
  $query="SELECT * FROM hotels WHERE htl_id=$id";  
  $row=mysqli_fetch_assoc($path);
  mysqli_query($conn,$delete);
  
  echo '<script type="text/javascript">
        window.location = "hotels.php";
        </script> ';    
  };

  if(isset($_GET["uid"])){
    $uid=$_GET["uid"];
    $query="SELECT * FROM slider WHERE sli_id=$uid";
    $res=mysqli_query($conn,$query);
    $dt=mysqli_fetch_assoc($res);
};

if(isset($_POST["updHotel"])){
    $name=$_POST["updHotelName"];
    $city=$_POST["updCity"];
    $rooms=$_POST["updRooms"];    
    $rating=$_POST["updRating"];
    $vacRooms=$_POST["updVacRooms"];
    $roomClass=$_POST["updRoomClass"];
    $charges=$_POST["updCharges"];

    $query="UPDATE `hotels` SET `htl_name`='$name',`htl_city`='$city',`htl_rating`=$rating,`htl_rooms`=$rooms,`htl_vacant_rooms`=$vacRooms,`htl_room_type`=$roomClass,`htl_room_charges`=$charges WHERE htl_id=$uid;";
    
    $res=mysqli_query($conn,$query);
    echo '<script type="text/javascript">
        window.location = "hotels.php";
        </script> ';
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
            
            if(isset($_GET["uid"])){
                $query="SELECT * FROM hotels h INNER JOIN classes c ON h.htl_room_type=c.class_id INNER JOIN rating r ON h.htl_rating=r.rt_id INNER JOIN slider s ON h.htl_image=s.sli_id WHERE htl_id=$uid;";
            $res=mysqli_query($conn,$query);
            $dt=mysqli_fetch_assoc($res);
                echo '<h1 class="h3 mb-2 text-gray-800">Update Hotel Details</h1>
                <form class="user" method="post">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="name" value="'.$dt["htl_name"].'" name="updHotelName" class="form-control"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Enter Hotel Name">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="name" name="updCity" value="'.$dt["htl_city"].'" class="form-control"
                                    id="exampleInputPassword" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <select name="updRating" id="" class="py-2 form-control" placeholder="Select Role">
                                    <option selected value='.$dt["rt_rating"].'>Select Hotel Rating</option>
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
                                <select name="updRoomClass" id="" class="py-2 form-control" placeholder="Select Role">
                                    <option selected value='.$dt["class_id"].'>Select Room Type</option>';
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
                                    <input type="name" value="'.$dt["htl_rooms"].'" name="updRooms" class="form-control"
                                        id="exampleInputPassword" placeholder="Total Rooms">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="name" value="'.$dt["htl_vacant_rooms"].'" name="updVacRooms" class="form-control"
                                        id="exampleInputPassword" placeholder="Vacant rooms">
                                </div>
                            </div> 
                            <div class="form-group row">                      
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" value="'.$dt["htl_room_charges"].'" name="updCharges" class="form-control"
                                        id="exampleInputPassword" placeholder="Charges">
                                </div>
                            </div>
                            <input type="submit" name="updHotel" class="btn btn-warning" value="Update">                                        
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
                            <input type="submit" name="addHotel" class="btn btn-dark" value="Add">                                        
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
           <th><a class="btn btn-warning" href="hotels.php?uid='.$row["htl_id"].'">Update</a></th>
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