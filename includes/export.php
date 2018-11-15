<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $connect = mysqli_connect('localhost', 'root', '', 'dp2');  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=salesreport.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('productID', 'productName', 'productQuantity', 'productPrice', 'totalrevenue'));  
      $query = "SELECT productID, productName, productQuantity, productPrice ,(productQuantity * productPrice) as TotalRevenue
from products ORDER BY productID";  
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>