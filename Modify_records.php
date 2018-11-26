<?php
	include 'includes\dbconnect.php';
	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_product']))
		if(isset($_POST['productName']) && 
		isset($_POST['productQuantity']) && 
		isset($_POST['productPrice']))
			if(!empty($_POST['productName']) && 
			!empty($_POST['productQuantity']) && 
			!empty($_POST['productPrice'])){
				$productName = $_POST['productName'];
				$productQuantity = $_POST['productQuantity'];
				$productPrice = $_POST['productPrice'];
		
		$SQLString="update products set productName='$productName',productQuantity='$productQuantity',productPrice='$productPrice' where productID=".$_POST['id'];
				//$SQLString = "INSERT INTO products (productName, productQuantity, productPrice) VALUES ('$productName', '$productQuantity', '$productPrice')";
				//echo $SQLString;
				if($DBConnect->query($SQLString) === TRUE){
					$data = "Record updated successfully";
					header('location: product_overview.php');
				}
			}
		
		if(isset($_GET['id'])){
			$query1 = "SELECT * from products where productID=".$_GET['id'];
						$results = mysqli_query($DBConnect, $query1);
						$row = mysqli_fetch_array($results);
						//echo "<pre>";
						//print_r($row); 			
		}
		$DBConnect->close();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit products</title>

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

      <a class="navbar-brand mr-1" href="product_overview.php">Family Aid Pharmacy Inc</a>

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
              <a href="product_overview.php">Product Overview</a>
            </li>
            <li class="breadcrumb-item active">Edit record</li>
          </ol>

          <div class="card mb-3">
        <div class="card-header">Edit record</div>
        <div class="card-body">
          <form method="post" action="Modify_records.php">
			<!-- Show encountered error here -->
			<?php include('includes\errors.php'); ?>
            <div class="form-group">
              <div class="form-group">
			    <label for="productName" class="col-6">Product Name</label>
                <input name="productName" type="text" class="form-control" value="<?php echo $row['productName']?>" placeholder="Product Name" required="required" autofocus="autofocus">
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
              </div>
            </div>
            <div class="col-6 form-group">
              <div class="row form-group">
			  <tr>
				  <div style="padding-left: 0px;" class="col-3">
					<th><label for="productQuantity" class="col-7">Product Quantity</label></th>
					<th><input name="productQuantity" placeholder="Enter Quantity" type="number" class="form-control" value="<?php echo $row['productQuantity']?>" required="required"></th>
				  </div>
				  
				  <div class="col-3">
					<th><label for="productPrice" class="col-8">Product Price</label></th>
					<th><input name="productPrice" type="number" placeholder="Enter Price" class="form-control" value="<?php echo $row['productPrice']?>" required="required"></th>
				  </div>
				  </tr>
              </div>
            </div>
            <button class="btn btn-primary" type="submit" name="add_product">EDIT</button>
          </form>
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
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
