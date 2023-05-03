<?php
require_once "header.php";

if(isset($_POST["queryMessage"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $subj=$_POST["subject"];
    $message=$_POST["message"];
    $query="INSERT INTO queries VALUES (NULL,'$name','$email','$subj','$message')";
    mysqli_query($conn,$query);
};

// if(isset($_POST["booking"])){  
//         // $name=$_SESSION["auth_user"]["id"];
//         $product=$_POST["hotelName"];
//         $room=$_POST["roomType"];
//         $fromDate=$_POST["fromDate"];
//         $toDate=$_POST["toDate"];
//         $persons=$_POST["persons"];
//         $query="INSERT INTO orders VALUES (NULL, 15,'$fromDate','$toDate','$product',$room,$persons)";
//         mysqli_query($conn,$query);
//         };

if(isset($_POST["booking"])){    
    if(!isset($_SESSION["auth_user"])){
        echo "<script>
        $(document).ready(funtion(){
        $('#signInModal').modal('show');
        };
        </script>";
        } else{   
        $name=$_SESSION["auth_user"]["id"];
        $product=$_POST["hotelName"];
        $room=$_POST["roomType"];
        $fromDate=$_POST["fromDate"];
        $toDate=$_POST["toDate"];
        $persons=$_POST["persons"];
        $query="INSERT INTO orders VALUES (NULL,$name,'$fromDate','$toDate','$product','$room',$persons)";
        mysqli_query($conn,$query);
        };
};
?>

<main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Contact us</h1>
          </div>
        </div>

        <div class="row gy-4">
<?php
    $query="SELECT * FROM contact";
    $res=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($res)){
        echo '<div class="col-md-4">
        <div class="info-item">
          <i class="bi bi-geo-alt"></i>
          <h3>Address</h3>
          <address>'.$row["cont_address"].'</address>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-4">
        <div class="info-item info-item-borders">
          <i class="bi bi-phone"></i>
          <h3>Phone Number</h3>
          <p><a href="tel:'.$row["cont_number"].'">'.$row["cont_number"].'</a></p>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-4">
        <div class="info-item">
          <i class="bi bi-envelope"></i>
          <h3>Email</h3>
          <p><a href="mailto:'.$row["cont_email"].'">'.$row["cont_email"].'</a></p>
        </div>
      </div><!-- End Info Item -->
';
    }



?>
          
        </div>
        <!-- Start Contact Form -->
        <div class="shadow-lg p-3 mb-5 bg-body rounded-0 mt-5">
          <form method="post" class="php-form">
            <h2 class="">Queries & Feedback</h2>
            <div class="row mt-4">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control rounded-0" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-4">
              <input type="text" class="form-control rounded-0" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-4">
              <textarea class="form-control rounded-0" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
            <div class="text-center">
                <input type="submit" value="Send Message" name="queryMessage" class="btn btn-dark rounded-0">   
            </div>
          </form>
        </div>
        <!-- End Contact Form -->

        <!-- Start Booking Form -->
        <div class="shadow-lg p-3 mb-5 bg-body rounded-0 mt-5">
          <form method="post" class="php-form">
            <h2 class="">Bookings</h2>
            <div class="row mt-4">
              <div class="form-group col-md-6">
              <label class="form-group">Select Hotel</label><select name="hotelName" id="" class="form-control rounded-0">
                    <option selected value="0">Select Hotel</option>
                <?php
                    $res=mysqli_query($conn,"SELECT * FROM hotels");
                    while($row=mysqli_fetch_assoc($res)){
                        echo'<option value="'.$row["htl_name"].'" selected>'.$row["htl_name"].'</option>';
                    };

                ?>
                </select>
              </div>
              <div class="form-group col-md-6">
              <label class="form-group">Select Room</label><select name="roomType" id="" class="form-control rounded-0">
                    <option selected value="0">Select Room</option>
                <?php
                    $res=mysqli_query($conn,"SELECT * FROM classes");
                    while($row=mysqli_fetch_assoc($res)){
                        echo'<option value="'.$row["class_id"].'" selected>'.$row["class"].'</option>';
                    };

                ?>
                </select>
              </div>
            </div>
            <div class="row mt-2">
             <div class="form-group col-md-6 mt-2">
             <label class="form-group">Start Date</label><input type="date" class="form-control rounded-0" name="fromDate" id="" required>
             </div>
             <div class="form-group col-md-6 mt-2">
             <label class="form-group">End Date</label><input type="date" class="form-control rounded-0" name="toDate" id="" required>
             </div>
            </div>
            <div class="form-group mt-4">
                <input type="number" class="form-control rounded-0" name="persons" id="" placeholder="How many persons?" required>
              </div>
            <div class="my-3">
            <div class="text-center">
                <input type="submit" value="Book Hotel" name="booking" class="btn btn-dark rounded-0">   
            </div>
          </form>
        </div>
        <!-- End Booking Form -->

      </div>
    </section>

  </main><!-- End #main -->

<?php
require_once "footer.php";
?>