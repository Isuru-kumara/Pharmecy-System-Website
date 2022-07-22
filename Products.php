<?php include("./header.php") ?>









    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="Home_page.php">Home</a>
                    
                    <span class="breadcrumb-item active">Products</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="row pb-3">   
                     
                        <?php
                            //sql quary for database
                            $sql2 ="SELECT * FROM tbl_medicine WHERE active='yes'";

                            //excuting quary
                            $res2=mysqli_query($conn,$sql2);
                            //count all the rows data validation;
                            $count2 =mysqli_num_rows($res2);
                                if ($count2 >0) 
                                {
                                    
                                    while ($row2=mysqli_fetch_assoc($res2)) 
                                    {
                                        $product_id=$row2['id']; 
                                        $product_name=$row2['titile'];
                                        $product_price =$row2['price'];
                                        $product_image_name =$row2['image_name'];

                                        ?>
                                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                                <div class="product-item bg-light mb-4">
                                                    <div class="product-img position-relative overflow-hidden">
                                                        <a href="<?php echo SITEURL;?>Product details.php?product_id=<?php echo $product_id; ?>">
                                                            <?php
                                                                ?>
                                                                   <img class="img-fluid w-100" src="<?php echo SITEURL;?>images/medicine/<?php echo $product_image_name; ?>" alt="">
                                                                <?php
                                                            ?>
                                                        </a>
                                                    </div>
                                                    <div class="text-center py-4">
                                                        <a class="h6 text-decoration-none text-truncate" href="<?php echo SITEURL;?>Product details.php?product_id=<?php echo $product_id; ?>"><?php echo $product_name; ?></a>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                         <h5><?php echo $product_price; ?></h5>
                                                        </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }

                                } 

                                else 

                                {
                                    # code...
                                }
                        ?>
                           

                    





                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>





                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->



    <?php include("./footer.php") ?>