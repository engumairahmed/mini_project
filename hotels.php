<?php
require_once "header.php";
$query="SELECT * FROM hotels";
$res=mysqli_query($conn,$query);

if(isset($_POST["hotelAdd"])){
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
    // header("location:hotels.php");
    };
};

?>

        <div class="container">            
        <h1 class="h3 mb-2 text-gray-800">Add Hotel</h1>
            <form class="user" method="post">
                        <div class="form-group">
                            <input type="name" name="hotelName" class="form-control w-50"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Hotel Name">
                        </div>
                        <div class="form-group">
                            <input type="name" name="city" class="form-control w-50"
                                id="exampleInputPassword" placeholder="City">
                        </div>
                        <div class="col-sm-6">
                            <select name="rating" id="" class="py-2 form-control" placeholder="Select Role">
                                <option selected value='0'>Select Hotel Rating</option>
                                    <?php
                                        $query="SELECT * FROM rating";
                                        $res=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($res)){
                                        echo '<option value="'.$row["rt_id"].'">'.$row["rt_rating"].'</option>';
                                        };
                                    ?>                
                            </select><br>
                        </div>
                        <div class="form-group">
                            <input type="name" name="rooms" class="form-control w-50"
                                id="exampleInputPassword" placeholder="Total Rooms">
                        </div>
                        <div class="form-group">
                            <input type="name" name="vacRooms" class="form-control w-50"
                                id="exampleInputPassword" placeholder="Vacant rooms">
                        </div>
                        <div class="col-sm-6">
                            <select name="roomClass" id="" class="py-2 form-control" placeholder="Select Role">
                                <option selected value='0'>Select Room Type</option>
                                    <?php
                                        $query="SELECT * FROM classes";
                                        $res=mysqli_query($conn,$query);
                                        while($row=mysqli_fetch_assoc($res)){
                                        echo '<option value="'.$row["class_id"].'">'.$row["class"].'</option>';
                                        };
                                    ?>                
                            </select><br>
                        </div>
                        <div class="form-group">
                            <input type="number" name="charges" class="form-control w-50"
                                id="exampleInputPassword" placeholder="Charges">
                        </div>
                        <input type="submit" name="hotelAdd" class="btn btn-primary" value="Add">                                        
                        <hr>
                                        
            </form>
        </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">View Hotels</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Information</h6>
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
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Hotel</th>
                                            <th>Rooms</th>
                                            <th>Vacant Rooms</th>
                                            <th>Room Type</th>
                                            <th>Charges</th>
                                            <th>Rating</th>
                                            <th>City</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        // while($row=mysqli_fetch_assoc($res)){

                                        // };
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