<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item active">Create Services</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create Services</h5>

            <?php

            if (isset($_POST['submit'])) {
              $icon = $_POST['icon'];
              $title = $_POST['title'];
              $description = $_POST['description'];
              // $username = $_POST['username'];
              // $password = md5($_POST['password']);

              if ($icon !="" && $title != ""  && $description != "" ) {
                $insert = "INSERT INTO services(icon, title, description)
VALUES('$icon','$title',  '$description')";
                $result = mysqli_query($con, $insert);

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Services are created</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  // header("Refresh:2; URL=index.php?success");
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Services is not created</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php
                  // header("Refresh:2; URL=create.php?error");
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php?error\">";
                }
              } else {

                header("Refresh:0; URL=create.php?empty");
              }
            }

            ?>


            <!-- Multi Columns Form -->
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Icon</label>
                <input type="text" class="form-control" name="icon" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="inputName5">
              </div>
              <div class="col-md-6">
                <!-- <textarea name="description" id="" cols="30" rows="10">Description</textarea> -->
                <label for="inputEmail5" class="form-label">Description</label>
                <input type="textarea" class="form-control" name="description" id="inputEmail5">
              </div>
             
              
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>