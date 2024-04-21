<?php require('../config/config.php');   ?>
<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>


<main id="main" class="main">
<?php
    if (isset($_GET['delete'])) {
    ?>
        <div class=" container alert alert-success alert-dismissible fade show" role="alert">
            <strong>Resume is Deleted!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    // header("Refresh:2; URL=index.php");
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
    }
    ?>

  <div class="pagetitle">
    <h1>Manage Resume</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Resume</li>
        <li class="breadcrumb-item active">Manage Resume</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Resume</h5>

            <!-- Table with stripped rows -->
            <a class="btn btn-primary btn-sm " href="create.php" role="button">Add Resume </a>

            <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>Resume-Title-ID</th>
                  <th>Title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Organization Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $select = 'SELECT *FROM resume';
                $result = mysqli_query($con, $select);
                $i = 1;
                while ($data = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['resume_title_id']; ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['start_date']; ?></td>
                    <td><?php echo $data['end_date']; ?></td>
                    <td><?php echo $data['org_name']; ?></td>
                    <td><?php echo $data['description']; ?></td>
                    <td>
                      <a class="btn btn-primary btn-sm " href="edit.php?id=<?php echo $data['id']; ?>" role="button">Edit </a>
                      <a class="btn btn-danger btn-sm " onclick="return confirm('Do you want to delete this user?');" href="delete.php?id=<?php echo $data['id']; ?>">Delete </a>
                    </td>
                  </tr>
                <?php
                }

                ?>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require('../includes/footer.php'); ?>