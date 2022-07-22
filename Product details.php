<?php include("./header.php") ?>;

 <!-- Breadcrumb Start -->
 <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="Home_page.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="Products.php">Products</a>
                    <span class="breadcrumb-item active">Product Details</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->

    <div class="container-fluid pb-5">
        <!-- selection strat here -->
    <?php
        if (isset($_GET['category_id'])) {
            //category id is set and get the id;
            $category_id =$_GET['category_id'];
            
            
            ?> <div class="container-fluid pb-5"> <?php
        
            //sql quary for get product base on we choos category id

            $sql2 ="SELECT * FROM tbl_medicine WHERE category_id =$category_id";
         
            //executing query

            $res2=mysqli_query($conn,$sql2);

            //count the all the rows;
            $count2=mysqli_num_rows($res2);

            //check whather product avalble or not;
                if ($count2 >0) {
                    # product avalable
                    //if prodct avalable get details in the database line by line;
                    while ($rows2=mysqli_fetch_assoc($res2)) 
                    {
                        //get the details;
                        $id =$rows2['id'];
                        $title =$rows2['titile'];
                        $description = $rows2['descrption'];
                        $price =$rows2['price'];
                        $image_name =$rows2['image_name'];
                        ?>
                            <div class="row px-xl-5 justify-content-center" >
                                                <div class="col-lg-5 mb-30">
                                                    
                                                        <div class="carousel-inner bg-light">
                                                            <div class="carousel-item active">
                                                                <?php
                                                                //check whether image avalabe or not
                                                                    if ($image_name =="") {
                                                                        # image not avalable
                                                                        echo "<div class='erro'> Image not avalable. </div>";
                                                                    } else {
                                                                        # image avable and show;
                                                                        ?>
                                                                            <img class="w-100 h-100" src="<?php echo SITEURL;?>images/medicine/<?php echo $image_name;?>" alt="Image">
                                                                        <?php
                                                                    }
                                            
                                                                ?>
                                                            </div>
                                                            
                                                        </div>
                                                </div>
                                                <div class="col-lg-5 h-auto mb-30">
                                                    <div class="h-100 bg-light p-30">
                                                        <h3><?php echo $title; ?></h3>
                                                        
                                                        <h3 class="font-weight-semi-bold mb-4">Rs: <?php echo $price; ?></h3>
                                                        <p class="mb-4"><?php echo $description;?> </p>

                                                        <div class="d-flex align-items-center mb-4 pt-2">
                                                            
                                                            <a href="<?php echo SITEURL;?>checkout.php?product_id=<?php echo $id; ?>">
                                                                <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> process to buy </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        <?php
                    }
                } 
                else {
                    # product not avable;
                    echo "<div class='erro'> product not found </div>";
                }
            ?> </div> <?php
            
    

            
        
        } elseif (isset($_GET['product_id'])) {
            //get details accoding to the id ;
                $product_id =$_GET['product_id'];
            //accoding to the product id show all the details;
            ?> <div class="container-fluid pb-5"> <?php
        
            //sql quary for get product base on we choos category id

            $sql2 ="SELECT * FROM tbl_medicine WHERE id =$product_id";
         
            //executing query

            $res2=mysqli_query($conn,$sql2);

            //count the all the rows;
            $count2=mysqli_num_rows($res2);

            //check whather product avalble or not;
                if ($count2 >0) {
                    # product avalable
                    //if prodct avalable get details in the database line by line;
                    while ($rows2=mysqli_fetch_assoc($res2)) 
                    {
                        //get the details;
                        $id =$rows2['id'];
                        $title =$rows2['titile'];
                        $description = $rows2['descrption'];
                        $price =$rows2['price'];
                        $image_name =$rows2['image_name'];
                        $discount_rate=$rows2['Discount_rate'];
                        ?>
                            <div class="row px-xl-5 justify-content-center" >
                                <div class="col-lg-5 mb-30">
                                    
                                <div class="carousel-inner bg-light">
                                <div class="carousel-item active">
                                    <?php
                                    //check whether image avalabe or not
                                        if ($image_name =="") {
                                            # image not avalable
                                            echo "<div class='erro'> Image not avalable. </div>";
                                        } else {
                                            # image avable and show;
                                            ?>
                                                <img class="w-100 h-100" src="<?php echo SITEURL;?>images/medicine/<?php echo $image_name;?>" alt="Image">
                                            <?php
                                        }
                
                                    ?>
                                </div>
                                    
                                </div>
                                </div>
                                <div class="col-lg-5 h-auto mb-30">
                                    <div class="h-100 bg-light p-30">
                                        <h3 class="font-weight-semi-bold mb-4"><?php echo $title; ?></h3>
                                        
                                        <h3 class="semi-bold mb-4">Rs: <?php echo $price; ?></h3>
                                        <h3 class="semi-bold mb-4"><?php
                                                                        if ($discount_rate>0) {
                                                                            ?>
                                                                            Discount-rate : <?php echo $discount_rate?> %

                                                                            <?php
                                                                        } 
                                                                       
                                                                        ?></h3>
                                        <p class="mb-4"><?php echo $description;?> </p>

                                        <div class="d-flex align-items-center mb-4 pt-2">
                                            
                                            
                                            
                                            <a href="<?php echo SITEURL;?>checkout.php?product_id=<?php echo $id; ?>">
                                            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> process to buy </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                } 
                else {
                    # product not avable;
                    echo "<div class='erro'> product not found </div>";
                }
            ?> </div> <?php
        } else {
                # go back to homepage;
                header('location'.SITEURL.'Home_page.php');
        }



           
           
    ?>
           

  <?php include("./footer.php") ?>;
