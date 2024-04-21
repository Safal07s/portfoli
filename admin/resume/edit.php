<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Resume</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Resume</li>
        <li class="breadcrumb-item active">Update Resume</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Resume</h5>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT *FROM resume WHERE id='$id'";
                $show_result = mysqli_query($con, $show_query);
                // To get only one row data
                $data = mysqli_fetch_assoc($show_result);
                // $data = $show_result->fetch_assoc();
            }
            
            if(isset($_POST['submit'])){
              $resume_title_id = $_POST['resume_title_id'];
              $title = $_POST['title'];
              $start_date = $_POST['start_date'];
              $end_date = $_POST['end_date'];
              $org_name = $_POST['org_name'];
              $description = $_POST['description'];

              if ($resume_title_id!= "" && $title != "" && $start_date != "" && $end_date != "" && $org_name != "" && $description != ""){
                $query =" UPDATE facts SET resume_title_id='$resume_title_id, title='$title', start_date='$start_date', end_date='$end_date', org_name='$org_name', description='$description'   WHERE id='$id'"; // variable
                $result= mysqli_query ($con, $query); // connect to database
                

        
            if ($result) {
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Resume is Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            // header("Refresh:2; URL=index.php?success");
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?suucces\">";

                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Resume is not Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                <?php
                            header("Refresh:2; URL=create.php?error");
                        }
                    } else {

                        header("Refresh:0; URL=create.php?empty");
                    }
                }

                ?>
  


            <!-- Multi Columns Form -->
            <a class="btn btn-success btn-sm " href="index.php" role="button">Manage Resume </a>
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
             
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Resume-Title-ID</label>
                <input type="text" class="form-control" name="resume_title_id" value="<?php echo $data['resume_title_id']; ?>" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" id="inputName5">
              </div>
              
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="<?php echo $data['start_date']; ?>" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" value="<?php echo $data['end_date']; ?>" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Organization Name</label>
                <input type="date" class="form-control" name="org_name" value="<?php echo $data['org_name']; ?>" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="inputName5" cols="30" rows="3"><?php echo $data['description']; ?></textarea>
              </div>

              
              <div class="col-md-12">
                <button type="submit" class="btn btn-danger" name="submit">Update</button>
              </div>
            </form><!-- End Multi Columns Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>