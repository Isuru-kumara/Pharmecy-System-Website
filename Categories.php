<?php include("./header.php") ?>
<!-- Categories Start -->
<div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        
        <div class="row px-xl-5 pb-3">
            <?php
             //create sql quary for get data/category from database;
             $sql ="SELECT * FROM tbl_category WHERE active='yes'";

             //excuting cuary;
             $res =mysqli_query($conn,$sql);

             //count row to check data avalabeli or not;
             $count =mysqli_num_rows($res);
               if ($count >0) 
               {
                # we have data in database;
                 while ($rows =mysqli_fetch_assoc($res)) 
                  {
                    $id =$rows['id'];
                    $title =$rows['title'];
                    $image_name=$rows['image_name']; 

                  ?>
                     <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <a class="text-decoration-none" href="<?php echo SITEURL;?>Product details.php?category_id=<?php echo $id; ?>">
                            <div class="cat-item d-flex align-items-center mb-4">


                                <div class="overflow-hidden" style="width: 100px; height: 100px;">

                                    <?php
                                        if ($image_name =="") 
                                        {
                                            echo "<div class='erro'>image not avalable </div>";
                                        }
                                        else
                                        { //image is avalable; 
                                            ?>
                                            <img style="width: 150px;" src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="">
                                            <?php
                                        }
                                    ?>       
                                </div> 
                                <div class="flex-fill pl-3">
                                    <h6><?php echo $title; ?></h6>
                                    
                                </div>
                            </div>
                         </a>
                      </div>
                  <?php

                }
               } 
               else 
               {
                // we didn't have data;

               }
            ?>
        </div>
    </div>
    <!-- Categories End -->
 <?php include("./footer.php") ?>