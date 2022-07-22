<?php include("./header.php") ;ob_start();?> 
  <!-- Breadcrumb Start -->
  <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="Home_page.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="Products.php">Products</a>
                    <a class="breadcrumb-item text-dark" href="Product details.php">Product Details</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<?php

    //get selecteed product id and check is set or not
    if (isset($_GET['product_id'])){
        // get it of the product;
        $product_id=$_GET['product_id'];

        //sql quary for grt data accoding to the prodact details;
        $sql3="SELECT * FROM tbl_medicine WHERE id =$product_id";

        $res3=mysqli_query($conn,$sql3);

        //count the all the rows;
        $count3=mysqli_num_rows($res3);

        //check whather product avalble or not;
            if ($count3 >0) 
            {
                # product avalable
                //if prodct avalable get details in the database line by line;
                while ($rows3=mysqli_fetch_assoc($res3)) 
                {
                    //get the details;
                    
                    $product_title =$rows3['titile'];
                    $product_price =$rows3['price'];
                    $product_imageName =$rows3['image_name'];
                    $product_description=$rows3['descrption'];
                    $avalavle_numberproduct=$rows3['number_of_product'];
                    $avalabilityfeathure=$rows3['featured'];
                    $Discount_rate=$rows3['Discount_rate'];

                }
            }

    }else{
        header('location'.SITEURL.'Product details.php');
    }
?>
    <!-- table start -->
    <br><br>
        <div class="container-fluid">
        <div class="row px-xl-5">
        <div class="col-lg-12">

        <form action="" method="post">
                            <table style="width: 100%; " class="table table-light table-borderless table-hover text-center mb-0">
                            <thead class="thead-dark" >
                                <tr>
                                    <th>Products</th>
                                    <th>Per_Price</th>
                                    <th>Quantity</th>
                                    <th>Item avalabality</th>
                                    <th>avalabality Quantity</th>
                                    <th>Discount rate</th>
                                    
                                </tr>
                            </thead>
                                <tbody class="align-middle">
                                    <tr>
                                        <td class="align-middle"><img src="<?php echo SITEURL;?>images/medicine/<?php echo $product_imageName;?>" alt="" style="width: 50px;"> <?php echo $product_title;?></td>
                                        <td class="align-middle"><?php echo $product_price;?></td>
                                        <td class="align-middle">
                                            <input type="number" name="pro_qty" placeholder="Enter quantity of product" required >
                                        </td> 
                                        <td class="align-middle"> <?php echo $avalabilityfeathure; ?> </td>
                                        <td class="align-middle"><?php echo $avalavle_numberproduct;?></td>
                                        <td class="align-middle"><?php echo $Discount_rate?>%</td>
                                        
                                    </tr>   
                                </tbody>
                            </table>
                        </div>
                        </div>
                        </div>
                        <br><br>
                            <!-- table End -->

                    
                        <!-- Checkout Start -->
                        <div class="container-fluid">
                            <div class="row px-xl-5 ">
                                <div class="col-lg-12">
                                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Fill The Customer Details</span></h5>
                                    <div class="bg-light p-30 mb-5">
                                        <div class="row ">

                                            
                                        
                                        <div class="col-md-6 form-group">
                                            <label>Customer Name</label>
                                            <input name="customer_name" class="form-control" type="text" placeholder="Enter your name">
                                        </div>


                                        <div class="col-md-6 form-group">
                                            <label>Customer Address</label>
                                            <input type="text" name="Customer_Address" class="form-control" placeholder="address">
                                             
                                        </div>
                                        
                                        <div class="col-md-6 form-group">
                                            <label>Customer E-mail</label>
                                            <input name="customer_email" class="form-control" type="text" placeholder="example@email.com">
                                        </div>
                                        
                                        <div class="col-md-6 form-group">
                                            <label>Customer City</label>
                                            <input name="customer_city" class="form-control" type="text" placeholder="your city">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Customer Mobile No</label>
                                            <input name="customer_mobile" class="form-control" type="text" placeholder="+94 456 789">
                                        </div>
                                        
                                    
                                        
                                        
                                        <div class="col-md-6 form-group">
                                            <label>Postal Code</label>
                                            
                                            <input type="text" name="postal_code" class="form-control" placeholder="postal-code">
                                            
                                        </div>
                                       
                                        
                                        <div class="col-md-12 form-group  " >   
                                                                                                        
                                            <input style="width:35%" type="submit" name="submit" value="submit" class="btn btn-primary">
                                       
                                        </div>
                                        

               
                        <?php
                            //process the value from Form and save it in database

                            // check the submit button click or not
                            if ( isset($_POST['submit'])) {
                               // echo "button is clicked";

                                //get the data from form;
                                $customer_name =$_POST['customer_name'];
                                $customer_email=$_POST['customer_email'];
                                $customer_mobile=$_POST['customer_mobile'];
                                $customer_address=$_POST['Customer_Address']; 
                                $customer_city=$_POST['customer_city'];
                                $customer_postalCode=$_POST['postal_code'];
                                $customer_quntity=$_POST['pro_qty'];

                                $total=$product_price*$customer_quntity;
                                $order_date=date("y-m-d h:i:sa"); //order date

                                $status="ordered"; // on deliverd,deleverd,cancelled 3option here

                                $new_numberproduct= $avalavle_numberproduct - $customer_quntity;

                                $discount=($total/100)*$Discount_rate;
                                $Net_total=$total-$discount;
                                // SQL to save data in database;

                                $sql= "INSERT INTO tbl_order SET
                                    products_name='$product_title',
                                    product_price =$product_price,
                                    image_name='$product_imageName',
                                    qty =$customer_quntity,
                                    total = $total,
                                    order_date='$order_date',
                                    status='$status',
                                    customer_name='$customer_name',
                                    customer_contact='$customer_mobile',
                                    customer_email='$customer_email',
                                    customer_address='$customer_address',
                                    customer_city ='$customer_city',
                                    customer_postalCode='$customer_postalCode',
                                    Discount_rate=$Discount_rate,
                                    net_total=$Net_total
                        
                                "; 

                                 //echo $sql; // cehck quary run or not


                                //3. executing quary and saving data in database,

                                $res = mysqli_query($conn,$sql);

                                //check whether data insert to database or not,
                                if ($res==TRUE) {
                                        //data is inserted
                                    //echo "data is inserted";
                                    // ceate a session to display massge;
                                                             //update the avalable store;

                                    $sql2="UPDATE tbl_medicine SET
                                    number_of_product = $new_numberproduct
                                    WHERE id =$product_id";

                                    //excuting sore manage quary;
                                    $res2= mysqli_query($conn,$sql2);
                                    if ($res2 ==TRUE) {
                                        $customer_quntity=0;
                                        $discount=0;
                                        header("Location:order.php?time=$order_date &customer_name=$customer_name");
                                    }  
                                }
                            }

                        ?>  
                
                    </div>
 
                </div>
    </form>
    </div>
            
    </div>
    </div>
<?php include("./footer.php") ?>


                                



      