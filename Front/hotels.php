<?php
require_once "header.php";
$res=mysqli_query($conn,"SELECT * FROM hotels");

?>

<main id="main">
    <section>
      <div class="container">
        <div class="row">

          <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Hotels</h3>
        <?php
            while($row=mysqli_fetch_assoc($res)){
               echo'<div class="d-md-flex post-entry-2 half">
               <a href="single-post.html" class="me-4 thumbnail">
                 <img src="'.$row["htl_image"].'" alt="" class="img-fluid">
               </a>
               <div>
                 <div class="post-meta"><span class="date">City</span> <span class="mx-1">&bullet;</span> <span>'.$row["htl_city"].'</span></div>
                 <h3><a href="single-page.php">'.$row["htl_name"].'</a></h3>
                 <p>'.$row["htl_name"].' offers a variety of rooms to meet the needs of the guests. Currently, this hotel has '.$row["htl_vacant_rooms"].' rooms available. Room charges vary depending on the room type and the length of your stay. Please visit our <a href="contact.php">Contact</a> page for booking and more information on availability and rates</p>
               </div>
             </div>'; 
            };
        ?>
            <div class="d-md-flex post-entry-2 half">
              <a href="single-post.html" class="me-4 thumbnail">
                <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                <h3><a href="single-page.php">What is the son of Football Coach John Gruden, Deuce Gruden doing Now</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">Wade Warren</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-start py-4">
              <div class="custom-pagination">
                <a href="#" class="prev">Prevous</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#" class="next">Next</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">


            <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
                <li><a href="hotels.php"><i class="bi bi-chevron-right"></i> Hotels</a></li>
                <li><a href="resorts.php"><i class="bi bi-chevron-right"></i> Resorts</a></li>
                <li><a href="restaurants.php"><i class="bi bi-chevron-right"></i> Restaurants</a></li>
                <li><a href="travel.php"><i class="bi bi-chevron-right"></i> Travel</a></li>
                <li><a href="tour.php"><i class="bi bi-chevron-right"></i> Toursit Spots</a></li>
              </ul>
            </div><!-- End Categories -->

          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->


<?php

require_once "footer.php"

?>