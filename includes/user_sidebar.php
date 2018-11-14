<?php 
if(isset($_SESSION['position']))
	if($_SESSION['position'] == "Manager")
		echo '
			<li class="nav-item">
				<a class="nav-link" href="analytics.php">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Analytics</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="add_product.php">
					<i class="fas fa-fw fa-table"></i>
					<span>Add Product</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="product_overview.php">
					<i class="fas fa-fw fa-table"></i>
					<span>Product Overview</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="sales_records.php">
					<i class="fas fa-fw fa-table"></i>
					<span>Sales Records</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="sales_report.php">
					<i class="fas fa-fw fa-table"></i>
					<span>Sales Report</span>
				</a>
			</li>
			';
	else if($_SESSION['position'] == "Staff")
		echo '
			<li class="nav-item active">
				<a class="nav-link" href="inventory.php">
					<i class="fas fa-fw fa-table"></i>
					<span>Inventory</span>
				</a>
			</li>
			';
?>