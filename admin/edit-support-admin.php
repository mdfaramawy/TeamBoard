<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['logid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $adminMsg  = $_POST['adminMsg'];
    $pdid = $_GET['editid'];
    $query = mysqli_query($con, "update team_board
                                   set  adminMsg  = '$adminMsg'
                                  Where id          = $pdid");
    if ($query) {
      $msg = "Record has been updated.";
    } else {
      $msg = "Something Went Wrong. Please try again";
    }
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIT Customers Tracker - Add</title>

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
          <li class="breadcrumb-item active">Add Customer</li>
        </ol>
        <p style="font-size:16px; color:green" align="center"> <?php if ($msg) {
                                                                  echo $msg;
                                                                }  ?> </p>
        <!-- Icon Cards-->

        <!-- Area Chart Example-->

        <?php
        $pdid = $_GET['editid'];
        $ret = mysqli_query($con, "SELECT id, supportTxt , planTxt , strategyTxt , file_1, file_2 , file_3, DATE_FORMAT(remarkDate, '%d/%m/%Y') AS remarkDate, adminMsg
                                   FROM  team_board
                                   WHERE id = '$pdid'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {
          ?>
          <!-- DataTables Example -->
          <form name="directory" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div>
                <p style="text-align: center; "><button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button></p>
              </div>
              <label for="createdBy"> Created By </label>
              <div class="form-label-group">
                <input type="text" id="createdBy" name="createdBy" style="text-align:center;" value="<?php
                                                                                                        $pdid = $_GET['editid'];
                                                                                                        $sqluser = mysqli_query($con, "SELECT fullName 
                                                                                                                                        FROM   tbluser t, team_board m
                                                                                                                                        WHERE  t.id=  m.createdBy and m.id= '$pdid'  limit 1 ");
                                                                                                        $value = mysqli_fetch_array($sqluser);
                                                                                                        echo $value[0];
                                                                                                        ?>" disabled>
              </div>
              <div class="form-row">
                <label for="adminMsg"> Admin Message</label>
                <textarea name="adminMsg" style="width:100%;text-align:right;background-color:powderblue;font-size:24px" rows="3" autofocus="autofocus"><?php echo $row['adminMsg']; ?></textarea>

              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="form-row">
                      <label for="strategyTxt"> Strategy</label>
                      <textarea name="strategyTxt" style="width:100%;text-align:right" rows="3" disabled>
                    <?php echo $row['strategyTxt']; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label for="planTxt"> Plan</label>
                  <textarea name="planTxt" style="width:100%;text-align:right" rows="3" disabled>
                  <?php echo $row['planTxt']; ?></textarea>
                </div>
                <div class="col-md-4">
                  <label for="supportTxt"> Support</label>
                  <textarea name="supportTxt" style="width:100%;text-align:right" rows="3" disabled>
                  <?php echo $row['supportTxt']; ?></textarea>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="file" id="file_1" name="file_1" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="file" id="file_2" name="file_2" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="file" id="file_3" name="file_3" disabled>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <div class="form-label-group">
                      <a href="uploads/<?php echo $row['file_1']; ?>"><?php echo $row['file_1']; ?> </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-label-group">
                      <a href="uploads/<?php echo $row['file_2']; ?>"><?php echo $row['file_2']; ?> </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-label-group">
                      <a href="uploads/<?php echo $row['file_3']; ?>"><?php echo $row['file_3']; ?> </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-4">
                    <div class="form-label-group">
                      <a href="uploads/<?php echo $row['file_1']; ?>"><?php echo $row['file_1']; ?> </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-label-group">
                      <a href="uploads/<?php echo $row['file_2']; ?>"><?php echo $row['file_2']; ?> </a>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-label-group">
                      <a href="uploads/<?php echo $row['file_3']; ?>"><?php echo $row['file_3']; ?> </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </form>

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
      <?php } ?>
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