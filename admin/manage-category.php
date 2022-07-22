
<?php include("part/menu.php") ?>
<div class="main-content">
    <div class="wrapper">

        <h1> category Management system </h1>
        </br>
        <br><br>
        <!-- Button to add admin  -->
        <a href="add-category.php" class="btn-primary"> Add New Category </a>
        </br></br>

        <?php

               if (isset($_SESSION['add-category'])) 
                    {
                         echo $_SESSION['add-category'];
                         unset($_SESSION['add-category']);
                    }

               if (isset($_SESSION['category-check'])) 
                    {
                         echo $_SESSION['category-check'];
                         unset($_SESSION['category-check']);
                    }

               if (isset( $_SESSION['remove'])) 
                    {
                      echo  $_SESSION['remove'];
                      unset( $_SESSION['remove']);
                    }
               if(isset ( $_SESSION['delete-category']))
                    {
                         echo $_SESSION['delete-category'];
                         unset($_SESSION['delete-category']);
                    }


               if(isset ( $_SESSION['delete-failed'] ))
                    {
                         echo $_SESSION['delete-failed'];
                         unset($_SESSION['delete-failed']);
                    }


               if(isset($_SESSION['no-category-found'])){

                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
               }


               if(isset($_SESSION['updated-category'])){

                    echo $_SESSION['updated-category'];
                    unset($_SESSION['updated-category']);
               }

               if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
               }

               if (isset($_SESSION['remove-current-img'])) 
               {
                 echo  $_SESSION['remove-current-img'];
                 unset( $_SESSION['remove-current-img']);
               }
               
          ?>

        <br><br>



        <table class="table-b">
            <tr>
                <th>ID Num</th>
                <th>Image</th>
                <th>Title</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>

            </tr>
            <?php

                    //quary to get all the data from dtabse;
                    $sql= "SELECT * FROM tbl_category";

                    //execute the quary;
                    $res =mysqli_query($conn,$sql);

                    //count all rows;

                    $count =mysqli_num_rows($res);
                    $id_echo =1;

                    if ($count >0) 
                    {
                         while ($rows =mysqli_fetch_assoc($res)) 
                         {
                              //use while loop to get all the data from database;
                              //and while loop run as long as we have data in database

                              //get individual data
                              $id=$rows['id'];
                              $title =$rows['title'];
                              $image_name =$rows['image_name'];
                              $featured =$rows['featured'];
                              $active =$rows['active'];

                              //Display the value in our table

                              ?>

            <tr>
                <td><?php echo $id_echo++; ?></td>

                <td>
                    <?php 

                                                  //image have or not
                                                  if ($image_name !="") 
                                                  {
                                                       // Display the image
                                                       ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?> " width="170px">
                    <?php
                                                  } 
                                                  else 
                                                  {
                                                       //display the massage
                                                       echo "<div class='erro'> Image is not added </div>";
                                                  }
                                             ?>
                </td>

                <td> <?php echo $title;  ?> </td>



                <td><?php echo $featured;  ?> </td>

                <td> <?php echo $active;  ?></td>


                <td> <a href="<?php echo SITEURL ?>admin/update-category.php  ?id=<?php echo $id;?>" class="btn-secondary" style="padding:5%;">
                        Update category </a> &nbsp;
                    <a href="<?php echo SITEURL ?>admin/delete-category.php ?id=<?php echo $id;?>&image_name=<?php echo $image_name?>"
                        class="btn-delet" style="padding:5%;"> Delete category </a>
                </td> <!-- pass the id of the category and image name to where we wnaat to delete -->
            </tr>
            <?php
                         }
                    }
                    else
                    {
                         //we dont have data in database;
                         $_SESSION['category-check'] = "<div class='erro'> No Category add to the Database </div>";
                    }





               ?>


        </table>




    </div>
</div>







<?php include("part/footer.php")   ?>