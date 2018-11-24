 <?php include('includes\dbconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Overview</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head> 
     
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">You are in Delete Mode?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Recycle Bin" below if you are ready to Delete the Product.</div>
		  <div align="center"  color="Red" class="modal-body">Warning once you click Delete You wont be able to recover the data again. If You still wish to continue press the recycle bin next to the porduct you wish to delete</div>
          <div class="modal-footer">
           
			<a <div class="card mb-3">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                    
                    </tr>
                  </thead>
			<?php
						$query1 = "SELECT * from products";
						$results = mysqli_query($DBConnect, $query1);
						while ($row = mysqli_fetch_array($results)) {
							echo "
								<tr>
									<td>".($row['productID'])."</td>
									<td>".($row['productName'])."</td>
									<td>".($row['productQuantity'])."</td>
									<td>".($row['productPrice'])."<a class='float-right' style='color: inherit;' href='includes/delete_product.php?id=".$row['productID']."'><span class='fa fa-trash-alt'></span></a></td>
								</tr>";
						}
					  ?>
					<tr>
					<th></th>
					 <th><a class="btn btn-secondary"  href="product_overview.php" type="button" data-dismiss="modal">Cancel</a></th>
            
			</tr>
			
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