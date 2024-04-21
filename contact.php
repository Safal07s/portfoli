<?php
require('includes/header.php');
?>


<?php
require('includes/navbar.php');
?>
<main id="main">
  <?php
  $settings = "SELECT *FROM settings";
  $settings_result = mysqli_query($con, $settings);
  while ($settings_data = $settings_result->fetch_assoc()) {
    if ($settings_data['site_key'] == 'map') {
      $map = $settings_data['site_value'];
    }
    if ($settings_data['site_key'] == 'location') {
      $location = $settings_data['site_value'];
    }
    if ($settings_data['site_key'] == 'email') {
      $email = $settings_data['site_value'];
    }
    if ($settings_data['site_key'] == 'call') {
      $call = $settings_data['site_value'];
    }
    if ($settings_data['site_key'] == 'contact') {
      $contact = $settings_data['site_value'];
    }
  }
  ?>
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p>
         <?php
          echo $contact;
          ?>
        </p>
        </div>

      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="<?php echo $map; ?>" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p><?php echo $location; ?></p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p><?php echo $call; ?></p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php require('includes/footer.php'); ?>
</body>

</html>