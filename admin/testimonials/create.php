<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Testimonilas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Testimonilas</li>
        <li class="breadcrumb-item active">Add Testimonilas</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Testimonilas</h5>


            <?php

            if (isset($_POST['submit'])) {

              $img= $_POST['img'];
              $name = $_POST['name'];
              $position = $_POST['position'];
              $message = $_POST['message'];

              
              if ($img!="" && $name != ""  && $position != "" && $message != "") {

                      $insert = "INSERT INTO testimonials(img,name,position,message)  
                    VALUES ( '$img','$name', '$position','$message')";
                      $result = mysqli_query($con, $insert);


                      if ($result) {
                      ?>
                      <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><?php echo "Testimonilas is submitted"; ?></h4>
                        </div>
                      <?php
                        

                        // header("Refresh:2; URl=index.php?success");
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                      } else {

                        echo "Testimonilas is not submitted";
                      }
                    }
            }

            ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <!-- <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" id="input1" aria-describedby="emailHelp">
              </div> -->
              <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalTitleId">
                        Choose Image
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <style>
                        [type=radio]:checked+img {
                          outline: 2px solid red;
                        }
                      </style>
                      <div class="row">
                        <?php
                        $select = 'SELECT *FROM files';
                        $result = mysqli_query($con, $select);
                        $i = 1;
                        while ($data = $result->fetch_assoc()) {
                        ?>
                          <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <label for="" id="new">
                              <input type="radio" name="fileName" id="new" value="<?php echo $data['img_link']; ?>">
                              <img src="../uploads/<?php echo $data['img_link']; ?>" name="img_link" class="w-100" alt="">
                            </label>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                      </button>
                      <button type="button" data-bs-dismiss="modal" onclick="firstImg()" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Optional: Place to the bottom of scripts -->
              <script>
                const myModal = new bootstrap.Modal(
                  document.getElementById("modalId"),
                  options,
                );
              </script>
              <!-- input box -->
              <div class="mb-3 d-flex">
                
                <input id="inputId" type="text" class="form-control" name="img" readonly class="w-75 d-block">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalId">choose<i class="fa-solid fa-check"></i>
                </button>
              </div>

              
              <div class="mb-3">
                <label for="input1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Position</label>
                <input type="text" class="form-control" name="position" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
              </div>

              <button type="submit" class="btn btn-danger btn-sm" name="submit">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  <script>
  {
    function firstImg() {
      let selectImg = document.querySelector('input[name=fileName]:checked').value;
      document.getElementById('inputId').value = selectImg;
    }

  }
</script>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>