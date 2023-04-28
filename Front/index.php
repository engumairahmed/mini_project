<?php
require_once "header.php"


?>

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
               <?php
                    $res=mysqli_query($conn,"SELECT * FROM slider");
                    while($row=mysqli_fetch_assoc($res)){
                        echo '<div class="swiper-slide">
                        <a href="single-post.html" class="img-bg d-flex align-items-end" style="background-image: url(./'.$row["sli_image"].');">
                          <div class="img-bg-inner">
                            <h2>'.$row["sli_heading"].'</h2>
                            <p>'.$row["sli_parag"].'</p>
                          </div>
                        </a>
                      </div>';
                    };


               ?>
               
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->


<?php

require_once "footer.php"

?>