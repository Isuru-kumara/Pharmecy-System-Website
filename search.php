<?php include("./header.php") ?>;

 <!-- Breadcrumb Start -->
 <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->

    <div class="container-fluid pb-5">
        <!-- selection strat here -->
        <?php
           
             // 1.1-get the searching key word;
            $search =$_POST['search'];
            

                //sql quary to get product based on ssearch key word;
            $sql ="SELECT * FROM tbl_medicine WHERE titile LIKE '%$search%' OR descrption LIKE '%$search%'";

            // excuting the quary
            $res =mysqli_query($conn,$sql);

            //count the all the rows;
            $count=mysqli_num_rows($res);

            //check whather product avalble or not;
                if ($count >0) {
                    # product avalable
                    //if prodct avalable get details in the database line by line;
                    while ($rows=mysqli_fetch_assoc($res)) 
                    {
                        //get the details;
                        $id =$rows['id'];
                        $title =$rows['titile'];
                        $description = $rows['descrption'];
                        $price =$rows['price'];
                        $image_name =$rows['image_name'];
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
                                                
                                                <h3 class="font-weight-semi-bold mb-4"><?php echo $price; ?></h3>
                                                <p class="mb-4"><?php echo $description;?> </p>


                                                
                                                
                                                    <a href="<?php SITEURL;?>checkout.php?product_id=<?php echo $id;?>">
                                                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Proceed to Buy </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                    }
                } else {
                    # product not avable;
                    echo "<div class='erro'> product not found </div>";
                }
           ?>
        <!-- selection end here -->
    </div>
  <?php include("./footer.php") ?>;


   