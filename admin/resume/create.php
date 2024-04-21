<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Create Resume</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Resume</li>
        <li class="breadcrumb-item active">Create Resume</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Create Resume</h5>

            <?php

            if (isset($_POST['submit'])) {
              $resume_title_id = $_POST['resume_title_id'];
              $title = $_POST['title'];
              $start_date = $_POST['start_date'];
              $end_date = $_POST['end_date'];
              $org_name = $_POST['org_name'];
              $description = $_POST['description'];

              if ($resume_title_id != "" && $title != "" && $start_date != "" && $end_date != "" && $org_name != "" && $description != "") {
                $insert = "INSERT INTO resume(resume_title_id, title,start_date,end_date,org_name,description)
VALUES('$resume_title_id', '$title', '$start_date', '$end_date', '$org_name', '$description' )";
                $result = mysqli_query($con, $insert);

                if ($result) {
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Resume is created</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                  // header("Refresh:2; URL=index.php?success");
                  echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                } else {
                ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Resume is not created</strong>
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
              <!-- modal body -->
              <div class="modal fade" id="modalID" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalID" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Choose ID</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <?php
                        $select = 'SELECT *FROM resume_titles';
                        $result = mysqli_query($con, $select);
                        $i = 1;
                        while ($data = $result->fetch_assoc()) {
                        ?>
                          <div class="col-md-6">
                            <label for="inputName5" class="form-label">Resume-Title-ID</label>
                            <input type="text" class="form-control" name="title" id="inputName5">
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
                      <button type="button" data-bs-dismiss="modal" onclick="firsttitle()" class="btn btn-primary">Save</button>
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
              <div class="mb-3 d-flex">
                
                <input id="inputId" type="text" class="form-control" name="title" readonly class="w-75 d-block">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalId">choose<i class="fa-solid fa-check"></i>
                </button>
              </div>

                  </div>
                </div>
              </div>





              <div class="col-md-6">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Start-date</label>
                <input type="date" class="form-control" name="start_date" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">End-date</label>
                <input type="date" class="form-control" name="end_date" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Organiation Name</label>
                <input type="text" class="form-control" name="org_name" id="inputName5">
              </div>

              <div class="col-md-6">
                <label for="inputName5" class="form-label">Description</label>
                <textarea name="org_name" class="form-control" id="inputName5" cols="30" rows="3"></textarea>
                <!-- <input type="text"  name="" id=""> -->
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
<script>
  {
    function firsttitle() {
      let selectTitle = document.querySelector('input[name=fileName]:checked').value;
      document.getElementById('inputId').value = selectTitle;
    }

  }
</script>

<?php require('../includes/footer.php'); ?>