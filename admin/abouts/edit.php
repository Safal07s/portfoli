<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Abouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Abouts</li>
        <li class="breadcrumb-item active">Update Abouts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update abouts</h5>
            <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $show_query = "SELECT *FROM abouts WHERE id='$id'";
              $show_result = mysqli_query($con, $show_query);
              // To get only one row data
              $data = mysqli_fetch_assoc($show_result);
              // $data = $show_result->fetch_assoc();
            }

            if (isset($_POST['submit'])) {
              $top_title = $_POST['top_title'];
              $title = $_POST['title'];
              $img = $_POST['img'];
              $top_description = $_POST['top_desc'];
              $description = $_POST['description'];
              // $password = $_POST['password'];

              // validation to input field
              if ($top_title != "" && $top_description !="" && $img != "" && $title != "" && $description != "" ) {
                $query = " UPDATE abouts SET top_title='$top_title', top_desc='$top_description', img='$img', title='$title', description='$description'  WHERE id='$id'"; // variable
                $result = mysqli_query($con, $query); // connect to database
              // validation to input field
              if ($top_title != "" && $top_description !=""   && $title != "" && $description != "" ) {
                $query = " UPDATE abouts SET top_title='$top_title', top_desc='$top_description', title='$title', description='$description'  WHERE id='$id'"; // variable
                $result = mysqli_query($con, $query); // connect to database

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Abouts is Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?suucces\">";

                  // header("Refresh:2; URL=index.php?success");  
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Abouts is not Updated</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php
                  header("Refresh:2; URL=create.php?error");
                }
              } else {

                // header("Refresh:0; URL=create.php?empty");
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=edit.php?empty\">";
              }
            }
            
          }
            

            ?>

          

            <a class="btn btn-success btn-sm " href="index.php" role="button">Manage abouts </a>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="input1" class="form-label">Top-title</label>
                <input type="text" class="form-control" value="<?php echo $data['top_title']; ?>" name="top_title" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Top-Description</label>
                <input type="text" class="form-control" value="<?php echo $data['top_desc']; ?>" name="top_desc" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Title</label>
                <input type="text" class="form-control" value="<?php echo $data['title']; ?>" name="title" id="input1" aria-describedby="emailHelp">
              </div>
              <!-- <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" value="#" name="img" id="input1" aria-describedby="emailHelp">
              </div> -->


              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?php echo $data['description']; ?></textarea>
              </div>

              <div class="mb-3">
                <img src="../uploads/<?php echo $data['img'] ?>" alt="" width="100" height="100">
              </div>

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

              <button type="submit" class="btn btn-danger btn-sm" name="submit">Update</button>

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