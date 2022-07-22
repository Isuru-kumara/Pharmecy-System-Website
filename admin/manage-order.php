<?php include("/xampp/htdocs/pharmacy-system/config/constants.php")?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pharmacy website - home page</title>
    <link rel="stylesheet" href="/pharmacy-system/css/admin.css">
    <link rel="stylesheet" href="/pharmacy-system/css/login.css">
    


</head>

<body>

    <!-- menu selection strats     -->
    <div class="menu">
        <div class="wrapper">
            <ul>
                <li> <a href="index.php"> Home </a></li>
                <li> <a href="admin-manage.php"> Admin </a></li>
                <li> <a href="manage-category.php"> Category </a></li>
                <li> <a href='manage-medicine.php'> Products </a></li>
                <li> <a href="manage-order.php"> Order </a></li>
                <li> <a href="logout.php" class="btn-submit"> Logout </a></li>
            </ul>
        </div>
    </div>

    <!-- menu selection ends  style="width:140%;"  style="width:50%; margin: 0 ;"  style="width:200%;" -->

<div class = "main-content" >
     <div class="wrapper "style="width:100% ;" >

          <h1> Order Management system  </h1>
          <br><br>
            <?php
                if (isset($_SESSION['order-update'])) 
                {
                    echo $_SESSION['order-update'];
                    unset($_SESSION['order-update']);
                }
            ?>
            <br><br>
     
          
               <table class="table-b" style="width:98% ;"  >
               <tr>
                    <th>Order id</th>
                    <th>Producat name</th>
                    <th>pro-price & qty</th>

                    
                    <th>Discount rate</th>
                    

                    <th>Net total</th>

                    
                    <th>customer name</th>
                    
                    <th>city</th>


                    <th>order date</th>
                    <th>Order status</th>
                    
                    <th colspan="4">Actions</th>
                    <th></th>

               </tr>
               <?php
                         //get all the orders from ordr tabble;
                         $sql="SELECT * FROM tbl_order";

                         //execute the query
                         $res=mysqli_query($conn,$sql);

                         //create id veriable;
                         $order_sn=1;

                         //count the all rows
                         $count=mysqli_num_rows($res);
                              //check whether data avalability of the table;
                              if ($count>0) {
                                   #data avalable
                                   //get all data rows by row
                                   while ($rows=mysqli_fetch_assoc($res)) 
                                   {
                                          $order_id=$rows['id'];
                                          $product_name=$rows['products_name'];
                                          $pro_price=$rows['product_price'];
                                          $qty=$rows['qty'];
                                          $total=$rows['total'];
                                          $order_date=$rows['order_date'];
                                          $order_status=$rows['status'];
                                          $customer_name=$rows['customer_name'];
                                          $customer_contact=$rows['customer_contact'];
                                          $customer_address=$rows['customer_address'];
                                          $customer_city=$rows['customer_city'];
                                          $customer_postalCode=$rows['customer_postalCode'];
                                          $Discount_rate=$rows['Discount_rate'];
                                          $net_total=$rows['net_total'];

                                          ?>
                                             <tr>
                    
                                                  <td><?php echo $order_sn++;?></td>
                                                  <td><?php echo $product_name; ?></td>
                                                  <td><?php echo $pro_price  ?> &nbsp;  <b>X</b>&nbsp;   <?php echo $qty;  ?></td>
                                                  
                                                  <td><?php echo $Discount_rate;  ?></td>
                                                  
                                                  <td>RS: <?php echo $net_total;  ?>.00</td>
                                                  <td><?php echo $customer_name;  ?></td>
                                                 
                                                  <td><?php echo $customer_city;  ?></td>
                                                  <td><?php echo $order_date;  ?></td>
                                                  <td><?php echo $order_status;  ?></td>
                                             
                                                  <td colspan="2"> <a href="<?php echo SITEURL;?>admin/update-order.php?order_id=<?php echo $order_id; ?>" class="btn-secondary">-Update-</a>
                                                  </td>
                                             </tr>

                                          <?php

                                          

                                   }
                              } else {
                                   # data not avalable;
                                   echo "<div class='erro'>No order avalabe</div>";

                              }
                              
               ?>
               
               
          </table>





     </div>
</div>











<!--  footer selection starts    -->
<div class="footer" >
    <div class="wrapper">

        <p class="text-center">
            <strong> 2022 All rights reserved, Calisto Medilab. Developed by - <a href="prabashanapubudu@gmail.com">
            </strong>group 11</a>

        </p>


    </div>
</div>
<!--  footer selection ends    -->

</body>

</html>