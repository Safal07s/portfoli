<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Facts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Facts</li>
        <li class="breadcrumb-item active">Update Facts</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update Facts</h5>

            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $show_query = "SELECT *FROM facts WHERE id='$id'";
                $show_result = mysqli_query($con, $show_query);
                // To get only one row data
                $data = mysqli_fetch_assoc($show_result);
                // $data = $show_result->fetch_assoc();
            }
            
            if(isset($_POST['submit'])){
              $numbers = $_POST['numbers'];
                $title = $_POST['title'];
                // $password = $_POST['password'];

          

                // validation to input field
            if($numbers!="" && $title!= "" ){
                $query =" UPDATE facts SET numbers='$numbers', title='$title'   WHERE id='$id'"; // variable
                $result= mysqli_query ($con, $query); // connect to database
                

        
            if ($result) {
                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Facts is Updated</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            // header("Refresh:2; URL=index.php?success");
                            echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?suucces\">";

                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Facts is not Updated</strong>
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
            <a class="btn btn-success btn-sm " href="index.php" role="button">Manage Facts </a>
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Numbers</label>
                <input type="number" class="form-control" name="numbers" value="<?php echo $data['numbers']; ?>" id="inputName5">
              </div>
              <div class="col-md-6">
                <label for="inputName5" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" id="inputName5">
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