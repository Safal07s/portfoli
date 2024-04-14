<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Files</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Files</li>
        <li class="breadcrumb-item active">Update File</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Files</h5>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT *FROM files WHERE id='$id'";
                $show_result = mysqli_query($con, $show_query);
                // To get only one row data
                $data = mysqli_fetch_assoc($show_result);
                // $data = $show_result->fetch_assoc();
            }
            
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $img = $_POST['img_link'];
                // $password = $_POST['password'];

                // validation to input field
            if($title!= "" && $description!="" && $img !="" ){
                $query =" UPDATE files SET title='$title', description='$description', img-link='$img'  WHERE id='$id'"; // variable
                $result= mysqli_query ($con, $query); // connect to database
                

        
            if ($result) {
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Files is Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            // header("Refresh:2; URL=index.php?success");
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?suucces\">";
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Files is not Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                <?php
                            header("Refresh:2; URL=create.php?error");
                        }
                    } else {

                        header("Refresh:0; URL=create.php?empty");
                        // echo "<meta http-equiv=\"refresh\" content=\"2;URL=.php?empty\">";

                    }
                }

                ?>
      
      <a class="btn btn-success btn-sm " href="index.php" role="button">Manage Files </a>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="input1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" id="input1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="input1" class="form-label">Image</label>
                <input type="file" class="form-control" name="dataFile" value="<?php echo $data['img_link']; ?>" id="input1" aria-describedby="emailHelp">
              </div>

              <div class="mb-3">
                <label for="input1" class="form-label">Description</label>
                <textarea class="form-control" id="input1" name="description"  rows="3"><?php echo $data['description']; ?></textarea>
              </div>

              <button type="submit" class="btn btn-danger btn-sm" name="submit">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php require('../includes/footer.php'); ?>