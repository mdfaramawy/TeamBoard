<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['logid'] == 0)) {
  header('location:logout.php');
} else {



  ?>



  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIT Customers Tracker</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">


    <!-- Navbar -->

    <?php include('include/header.php'); ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <?php include('include/sidebar.php'); ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Customers</li>
          </ol>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Interface</th>
<!--
                <th>Object Type</th>
                <th>Module</th>
                <th>File</th>
-->                
                <th align="right">Notes</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php
              $loginid = $_SESSION['logid'];
              $admin_ind = $_SESSION['admin_ind'];
              if ($admin_ind == 1) {
                $ret = mysqli_query($con, "SELECT id, Interface , objectType , module , fileName , Notes ,  DATE_FORMAT(regDate, '%d/%m/%Y') AS regDate
                                        FROM  modifications");
              } else {
                $ret = mysqli_query($con, "SELECT id, Interface , objectType , module , fileName , Notes ,  DATE_FORMAT(regDate, '%d/%m/%Y') AS regDate
                                          FROM  modifications
                                          WHERE created_by = '$loginid'");
              }
              $cnt = 1;
              while ($row = mysqli_fetch_array($ret)) {
                ?>
              <tr>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['Interface']; ?></td>
<!--                <td><?php echo $row['objectType']; ?></td>
                <td><?php echo $row['module']; ?></td>
                <td><?php echo $row['fileName']; ?></td>
              -->                
                <td><?php echo $row['Notes']; ?></td>
                <td><?php echo $row['regDate']; ?></td>
                <td><a href="edit-mod.php?editid=<?php echo $row['id']; ?>">Edit Detail</a>
              </tr>
            <?php
                $cnt = $cnt + 1;
              } ?>



          </table>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include('include/footer.php'); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

  </html>
<?php }  ?>