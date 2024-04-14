<?php
require('includes/header.php');
?>


<?php
require('includes/navbar.php');
?>


<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <?php
    $abouts = "SELECT *FROM abouts";
    $about_result = mysqli_query($con, $abouts);
    $about_data = $about_result->fetch_assoc();
    ?>
    <div class="container" data-aos="fade-up">

      <div class="section-title">

        <h2><?php echo $about_data['top_title']; ?></h2>
        <p><?php echo $about_data['top_desc']; ?></p>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <img src="admin/uploads/<?php echo $about_data['img'];  ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content">
          <h3><?php echo $about_data['title']; ?></h3>
          <p class="fst-italic">
            <?php echo $about_data['description']; ?>
          </p>
          <div class="row">
            <?php
            $settings = "SELECT *FROM settings";
            $settings_result = mysqli_query($con, $settings);
            while ($settings_data = $settings_result->fetch_assoc()) {
              if ($settings_data['site_key'] == 'birthday') {
                $birthday = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'age') {
                $age = $settings_data['site_value'];
              }
            }
            ?>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-rounded-right"></i> <strong>Birthday:</strong> <?php echo $birthday;?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Website:</strong> www.example.com</li>
                <li><i class="bi bi-rounded-right"></i> <strong>Phone:</strong> +123 456 7890</li>
                <li><i class="bi bi-rounded-right"></i> <strong>City:</strong> City : New York, USA</li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-rounded-right"></i> <strong>Age:</strong> <?php echo $age;?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Degree:</strong> Master</li>
                <li><i class="bi bi-rounded-right"></i> <strong>PhEmailone:</strong> email@example.com</li>
                <li><i class="bi bi-rounded-right"></i> <strong>Freelance:</strong> Available</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Skills</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row skills-content">
        <?php
        $skills = "SELECT *FROM skills";
        $skills_result = mysqli_query($con, $skills);
        while ($skills_data = $skills_result->fetch_array()) {
        ?>
          <div class="col-lg-6 mb-3">

            <div class="progress">
              <span class="skill"><?php echo $skills_data['title']; ?></span>
              <div class="bg-light shadow">
                <p><?php echo $skills_data['description']; ?></p>
              </div>
            </div>
          </div>
        <?php
        }
        ?>


      </div>

    </div>
  </section><!-- End Skills Section -->

  <!-- ======= Facts Section ======= -->
  <section id="facts" class="facts">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Facts</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row counters">
        <?php
        $facts = "SELECT *FROM facts";
        $facts_result = mysqli_query($con, $facts);
        while ($facts_data = $facts_result->fetch_array()) {
        ?>
          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php echo $facts_data['numbers']; ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?php echo $facts_data['title']; ?></p>
          </div>
        <?php } ?>

      </div>

    </div>
  </section><!-- End Facts Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Testimonials</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->

<?php
require('includes/footer.php');
?>