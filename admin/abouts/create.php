<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Layouts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Multi Columns Form</h5>

            <?php


            if (isset($_POST['submit'])) {
              $top_title = $_POST['top_title'];
              $top_description = $_POST['top_desc'];
              $title = $_POST['title'];
              $description = $_POST['description'];
              $img = $_POST['img'];
              // $username = $_POST['username'];
              // $password = md5($_POST['password']);

              if ($title != ""  && $description != "") {
                $insert = "INSERT INTO abouts(top_title, top_desc, title, description, img)
VALUES('$top_title',  '  $top_description', '$title', '$description', '$img')";
                $result = mysqli_query($con, $insert);

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Skills are created</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  // header("Refresh:2; URL=index.php?success");
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Skill is not created</strong>
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
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="input1" class="form-label">Top Title</label>
                <input type="text" class="form-control" name="top_title" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Top Description</label>
                <input type="text" class="form-control" name="top_desc" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="input1" aria-describedby="emailHelp">
              </div>

              <!-- Modal trigger button -->

              <!-- Modal Body -->
              <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
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


              <button type="submit" class="btn btn-danger btn-sm" name="submit">Submit</button>

            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<script>
  {
    function firstImg() {
      let selectImg = document.querySelector('input[name=fileName]:checked').value;
      document.getElementById('inputId').value = selectImg;
    }

  }
</script>

<?php require('../includes/footer.php'); ?>