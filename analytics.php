<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto pull-right">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
      <?php include('includes\user_sidebar.php') ?>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Charts</li>
          </ol>

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar"></i>
                  Daily</div>
                <div class="card-body">
                  <canvas id="myBarChartDay" width="100%" height="50"></canvas>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
            </div>
          </div>
      
      <div class="row">
            <div class="col-lg-12">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar"></i>
                  Monthly</div>
                <div class="card-body">
                  <canvas id="myBarChartMonth" width="100%" height="50"></canvas>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
            </div>
          </div>
      
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-bar"></i>
                   
                      <!-- select individual product  -->   
                          <div class="input-group-prepend float-right">
                              <label class="input-group-text" for="inputGroupSelect01" >Products</label>

                              <form action = "includes/analytic_orders_data.php" method = "POST">
                           
                            <select class="custom-select" id="Product" name = "PName" onchange="this.form.submit()">
                               

                              <?php
                                  $con = mysqli_connect("localhost", "root", "", "dp2");
                                  $count = 0;
                                  $result = mysqli_query($con, "SELECT productName FROM orders GROUP BY productName ORDER BY productName");
                                  
                                  while($row = mysqli_fetch_assoc($result))
                                  {
                                     $rows[] = $row;
                                  }

                                  foreach($rows as $row)
                                   {
                                      echo "<option value = " . "'" . $row['productName'] . "'" . ">" . $row['productName'] . "</option>";
                                   }?> 


                                   <!--  foreach($rows as $row)
                                    {
                                      if($row['productQuantity'] < 20)
                                      {
                                        echo 
                                        "<a class='dropdown-item' href='#'> Stock of ". " " . $row['productName'] . " only has " . $row['productQuantity'] . " " . "left</a>
                                         <div class='dropdown-divider'></div>"; 
                                      }
                                    }




                              <option value = "All">All</option>
                              <option value="medicine">Medicine</option>
                              <option value="Penicilin">Penicilin</option>
                              <option value="Panadol">Panadol</option>
                              <option value = "Acetaminophen">Acetaminophen</option>
                              <option value = "Lisinopril">Lisinopril</option>
                              <option value = "Zoloft">Zoloft</option> -->
                            </select>

                            <!-- <script>
                              var value;
                                function split(value)
                                {
                                  this.value = value;
                                  alert(this.value);
                                }
                               </script> -->

                            <!-- <input type="hidden" name="Flag" value="0"/> -->
                          </form>
                        </div>
                    Yearly
                </div>
                <div class="card-body">
                  <canvas id="myBarChartYear" width="100%" height="50"></canvas>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

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
            <a class="btn btn-primary" href="login.php">Logout</a>
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

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/orders_analytics.js"></script>

  </body>

</html>
