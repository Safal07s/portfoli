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
            
              if ($settings_data['site_key'] == 'Website') {
                $Website = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'phone') {
                $phone = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'city') {
                $city = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'degree') {
                $degree = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'freelance') {
                $freelance = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'skills') {
                $skills = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'facts') {
                $facts = $settings_data['site_value'];
              }
              if ($settings_data['site_key'] == 'testimonials') {
                $testimonials = $settings_data['site_value'];
              }
            }
            ?>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-rounded-right"></i> <strong>Birthday:</strong> <?php echo $birthday;?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Website:</strong> <?php echo $Website; ?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Phone:</strong> <?php echo $phone;?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>City:</strong> <?php echo $city;?> </li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-rounded-right"></i> <strong>Age:</strong> <?php echo $age;?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Degree:</strong> <?php echo $degree;?> </li>
                <li><i class="bi bi-rounded-right"></i> <strong>Freelance:</strong> <?php echo $freelance;?></li>
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
        <p>
          <?php echo $skills;
           ?>
        </p>
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
        <p>
          <?php echo $facts; ?>
        </p>
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
        <p>
          <?php  echo $testimonials;?>
         
        </p>
        </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
        <?php
        $testimonials = "SELECT *FROM testimonials";
        $testimonials_result = mysqli_query($con, $testimonials);
        while ($testimonials_data = $testimonials_result->fetch_array()) {
        ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="admin/uploads/<?php echo $testimonials_data['img'];  ?>" class="testimonial-img" alt="">
              <h3><?php echo $testimonials_data['name']; ?></h3>
              <h4><?php echo $testimonials_data['position']; ?></h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php echo $testimonials_data['message']; ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

        <?php
        }
        ?>

        <!-- ##### -->
          

            
<!-- ///////// -->
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->

<?php
require('includes/footer.php');
?>