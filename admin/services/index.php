<?php require('../config/config.php');   ?>
<?php require('../includes/header.php'); ?>

<?php require('../includes/navbar.php'); ?>

<?php require('../includes/sidebar.php'); ?>


<main id="main" class="main">
<?php
    if (isset($_GET['delete'])) {
    ?>
        <div class=" container alert alert-success alert-dismissible fade show" role="alert">
            <strong>Services is Deleted!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    // header("Refresh:2; URL=index.php");
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
    }
    ?>

  <div class="pagetitle">
    <h1>Manage Services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item active">Manage Services</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Services</h5>

            <!-- Table with stripped rows -->
            <a class="btn btn-primary btn-sm " href="create.php" role="button">Add Services </a>

            <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    #
                  </th>
                  <th>Icon</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $select = 'SELECT *FROM services';
                $result = mysqli_query($con, $select);
                $i = 1;
                while ($data = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $data['icon']; ?></td>
                    <td><?php echo $data['title']; ?></td>
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