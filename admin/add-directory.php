 <?php
  session_start();
  error_reporting(0);
  include('include/dbconnection.php');
  if (strlen($_SESSION['pdaid'] == 0)) {
    header('location:logout.php');
  } else {
      if (isset($_POST['submit'])) {
        $module     = $_POST['module'];
        $object     = $_POST['object'];
        $filename   = $_POST['filename'];
        $notes      = $_POST['notes'];
        $descar     = $_POST['descar'];
        $datesent   = $_POST['datesent'];
        $interface  = $_POST['interface'];
        $compfile1  = $_FILES["file_1"]["name"];
        $compfile2  = $_FILES["file_2"]["name"];
        $compfile3  = $_FILES["file_3"]["name"];
        $created_by = $_SESSION['pdaid'];
        // check if file_1 is not empty
        if(!empty($_FILES['file_1']))
        {
          $path = "uploads/";
          $path = $path . basename( $compfile1);
          move_uploaded_file($_FILES['file_1']['tmp_name'], $path);
        }

        // check if file_2 is not empty
        if(!empty($_FILES['file_2']))
        {
          $path = "uploads/";
          $path = $path . basename( $compfile2);
          move_uploaded_file($_FILES['file_2']['tmp_name'], $path);
        }

        // check if file_3 is not empty
        if(!empty($_FILES['file_3']))
        {
          $path = "uploads/";
          $path = $path . basename( $compfile3);
          move_uploaded_file($_FILES['file_3']['tmp_name'], $path);
        }        

        $query = mysqli_query($con, "insert into  modifications(module,objectType,fileName,notes,interface,created_by, descAr, dateSent, file_1, file_2, file_3) 
	                                                value   ('$module','$object','$filename','$notes','$interface', '$created_by' , '$descar', '$datesent', '$compfile1', '$compfile2' , '$compfile3' )");
        if ($query) {
          $msg = "Customer detail has been added.";
        } else {
          $msg = "Something Went Wrong. Please try again" . mysqli_error($con);
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


           <!-- DataTables Example -->
           <form name="directory" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <div class="form-row">
                 <div class="col-md-4">
                   <label for="module"> Module</label>
                   <div class="form-label-group">
                     <select name="module" id="module" class="form-control wd-450" required="true" autofocus="autofocus">
                       <option value="AP" selected="true">AP</option>
                       <option value="AR">AR</option>
                       <option value="GL">GL</option>
                       <option value="HR">HR</option>
                       <option value="INV">INV</option>
                       <option value="SYS">SYS</option>
                       <option value="FA">FA</option>
                       <option value="WS">WS</option>
                       <option value="CSH">CSH</option>
                     </select>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <label for="object"> Object Type</label>
                   <div class="form-label-group">
                     <select name="object" id="object" class="form-control wd-450" required="true">
                       <option value="form" selected="true">Form</option>
                       <option value="report">Report</option>
                     </select>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <label for="interface"> Interface</label>
                   <div class="form-label-group">
                     <select name="interface" id="interface" class="form-control wd-450" required="true">
                       <option value="6i" selected="true">6i Forms</option>
                       <option value="12C">12c Forms</option>
                     </select>
                   </div>
                 </div>
               </div>
             </div>

             <div class="form-group">
               <div class="form-row">
                 <label for="notes"> Notes</label>
                 <textarea name="notes" style="width:100%;text-align:right" rows="3"></textarea>
               </div>
             </div>

             <div class="form-group">
               <div class="form-row">
                 <div class="col-md-4">
                   <label for="filename"> File Name</label>
                   <div class="form-label-group">
                     <input type="text" id="filename" name="filename" >
                   </div>
                 </div>
                 <div class="col-md-4">
                   <label for="descar"> اسم الشاشه/التقرير</label>
                   <div class="form-label-group">
                     <input type="text" id="descar" name="descar" >
                   </div>
                 </div>
                 <div class="col-md-4">
                   <label for="datesent"> Send Date</label>
                   <div class="form-label-group">
                     <input type="date" id="datesent" name="datesent" >
                   </div>
                 </div>
               </div>
             </div>
             <div class="form-group">
               <div class="form-row">
                 <div class="col-md-4">
                   <div class="form-label-group">
                     <input type="file" id="file_1" name="file_1" >
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-label-group">
                     <input type="file" id="file_2" name="file_2" >
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-label-group">
                     <input type="file" id="file_3" name="file_3" >
                   </div>
                 </div>
               </div>
             </div>
             <div>
               <p style="text-align: center; "><button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">ADD</button></p>
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
