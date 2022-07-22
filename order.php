

<?php include("/xampp/htdocs/pharmacy-system/config/constants.php")?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Order Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <!-- Libraries Stylesheet -->
   <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
                        if (isset($_GET['time']) && isset($_GET['customer_name']))
                        {
                            //echo "done";
                            $time=$_GET['time'];
                            $customer_name=$_GET['customer_name'];

                            //sql quary to get data from order table

                            $sql="SELECT * FROM tbl_order WHERE customer_name ='$customer_name' AND order_date = '$time'";

                            //excuting quary
                            $res=mysqli_query($conn,$sql);
                            
                            //count the rows
                            $count=mysqli_num_rows($res);
                            
                            //check whether data avalable or not;
                            if ($count >0) {
                                //echo 'okay';
                                while ( $row=mysqli_fetch_assoc($res)) 
                                {
                                    $order_id=$row['id'];
                                    $product_name=$row['products_name'];
                                    $product_price=$row['product_price'];
                                    $product_imageName=$row['image_name'];
                                    $product_qty=$row['qty'];
                                    $total_price=$row['total'];
                                    $customer_contact=$row['customer_contact'];
                                    $customer_address=$row['customer_address'];
                                    $customer_city=$row['customer_city'];
                                    $Discount_rate=$row['Discount_rate'];
                                    $Net_total=$row['net_total'];

                                }
                            }

                        }
                    ?>

<!-- Card -->
    <div class="containerrrr">
        <div class="carddddd bg-light">
                    <div class="containerrrrs bg-primary py-3">
                        <h4 align="center"><b>Order Confirmation</b></h4>
                    </div>
                <div class="row">
                    <div class="col-lg-4"><br><br><br>
                        <img src="<?php echo SITEURL;?>images/medicine/<?php echo $product_imageName;?>" alt="hutta" style="width: 100%;">
                    </div>
                    <div class="col-lg-8">

                    
                <br>
                <h4 align="center"><b>Thank You for your order</b></h4><hr>
                <div class="row">

                    <div class="col-6">
                        <h6>Name: <?php echo $customer_name;?> </h6>  
                    
                    </div>
                    <div class="col-6">
                      
                        <h6 align="center">Order Date: &nbsp;&nbsp;<?php echo $time;?> </h6>
                    </div><hr>
                </div><hr>

                <h6><?php echo $customer_address;?></h6>
                <h6><?php echo $customer_city;?></h6>
                <h6><?php echo $customer_contact;?></h6> <hr>

                <h5 align="center"><b>Purches Confirmation Details</b></h5>
                <h6><?php echo $product_name;?></h6>
                <h6><?php echo $product_qty;?> X <?php echo $product_price;?></h6> <hr>

                

                <div class="row">

                    <div class="col-6">
                        <h6>Total:  </h6>
                        <h6>Discount: </h6> 
                        <h6>Sub Total: </h6> 
                    
                    </div>
                    <div class="col-6">
                      
                        <h6 align="center">&nbsp;&nbsp; <?php echo $total_price;?> </h6>
                        <h6 align="center">&nbsp;&nbsp; 
                            <?php
                                    if ($Discount_rate ==0) 
                                    {
                                    echo "No Discounts";
                                    }
                                    else{
                                        echo $Discount_rate."%";
                                        //$discount=
                                    }
                                
                            ?> 
                        </h6>
                        <h6 align="center">&nbsp;&nbsp; Rs: <?php echo $Net_total;?> .00</h6>
                    </div>    
                </div><hr>
                    
                    <form action="<?php SITEURL;?>Home_page.php">
                        <input class="btn btn-primary" type="submit" value="confirm order" style="width:70%;" >
                    </form><br>
              
                </div>
            </div>
        </div>
    </div>
</body>
</html>



