
<?php include("part/menu.php") ?>



<div class = "main-content" >
     <div class="wrapper">

          <h1> Products Management System </h1>
          </br>
          <!-- Button to add admin  -->
          <a href="<?php echo SITEURL; ?>admin/add-medecine.php " class="btn-primary"> Add New Products </a>
          </br>
          <?php
                if (isset($_SESSION['add-medicine'])) {
                
                    echo $_SESSION['add-medicine'];
                    unset($_SESSION['add-medicine']);
                }

                if (isset($_SESSION['delete-list'])) {
                    echo $_SESSION['delete-list'];
                    unset($_SESSION['delete-list']);
                }
                
                if (isset($_SESSION['delete-medicine'])) {
                    echo $_SESSION['delete-medicine'];
                    unset($_SESSION['delete-medicine']);
                }
                if (isset($_SESSION['failed-to-remove-pic'])) {
                    echo $_SESSION['failed-to-remove-pic'];
                    unset($_SESSION['failed-to-remove-pic']);
                }

                if (isset($_SESSION['no-medicine-found'])) {
                    echo $_SESSION['no-medicine-found'];
                    unset($_SESSION['no-medicine-found']);
                }

                if (isset($_SESSION['upload-new-medic-pic'])) {
                    echo $_SESSION['upload-new-medic-pic'];
                    unset($_SESSION['upload-new-medic-pic']);
                    
                }
                if (isset($_SESSION['remove-current-medic-img'])) {
                    echo $_SESSION['remove-current-medic-img'];
                    unset($_SESSION['remove-current-medic-img']);
                }

                if (isset($_SESSION['updated-medic-list'])) {
                    echo $_SESSION['updated-medic-list'];
                    unset($_SESSION['updated-medic-list']);
                }
          ?>

<br><br>
          <table class="table-b" style="border: 0.5px solid #ddd;">
               <tr >
                    <th colspan="2" >ID</th>
                    <th colspan="2" >Title</th>
                    <th colspan="2">Price</th>
                    <th colspan="2"> Quantity </th>
                    <th colspan="2"> Discount Rate </th>
                    <th colspan="2">Image</th>
                    <th colspan="2">featured</th>
                    <th colspan="2">Active</th>
                    <th colspan="2">Actions</th>

               </tr>
               <?php
                    //SQL for get all the medic list;
                    $sql = "SELECT * FROM tbl_medicine";

                    //executing;
                    $res=mysqli_query($conn,$sql);
                     
                    //counting rows
                    $count=mysqli_num_rows($res);

     //set up veriable for id;
                    $id_num=1;
                    if ($count >0) 
                      {
                         # show all the list;
                         //get the details from database and display;
                         while($rows= mysqli_fetch_assoc($res))
                              {
                                   //get the value for display
                                   $id=$rows['id'];
                                   $title =$rows['titile'];
                                   
                                   $price =$rows['price'];
                                   $quntity=$rows['number_of_product'];
                                   $image_name =$rows['image_name'];
                                   $featured=$rows['featured'];
                                   $active =$rows['active'];
                                   $discount_rate=$rows['Discount_rate'];

                                   ?>
                                   <tr>
                                        <td colspan="2" > <?php echo $id_num++;?> &nbsp;&nbsp; </td>
                                        <td colspan="2"  width="100px"><p width="100"> <?php echo $title;?></p>&nbsp;&nbsp;</td>
                                        <td colspan="2" >Rs: <?php echo $price; ?> </td>
                                        <td colspan="2" ><?php echo $quntity; ?> </td>
                                        <td colspan="2" ><?php echo $discount_rate; ?> </td>
                                        <td colspan="2">
                                             <?php
                                                  if ($image_name !="") {
                                                       # display image;
                                                       ?>
                                                            <img src="<?php echo SITEURL; ?>images/medicine/<?php echo $image_name;?>" width="180px" >
                                                       <?php



                                                  } else {
                                                       # display erreo masaage;

                                                  }
                                                  

                                             ?> 
                                        </td>
                                        <td colspan="2" ><?php echo $featured;?>     </td>
                                        <td colspan="2" ><?php echo $active;?>   </td>


                                        <td> <a href="<?php echo SITEURL;?>admin/update-list.php?id=<?php echo $id;?>" class="btn-secondary">  update list  </a> &nbsp;
                                             <a href="<?php echo SITEURL;?>admin/delete-list.php?id=<?php echo $id;?> &image_name=<?php echo $image_name;?>" class="btn-delet">  Delete list  </a>
                                        </td>
                                   </tr>



                                   <?php



                              }

                      } 
                    
                    else 
                      {
                         // database is empty;
                         echo "<tr> <td colsoan ='7' class='erro' > Still not add the medicine. </td></tr>";
                      }
                    



               ?>
               
               
          </table>





     </div>
</div>


                 

                        










<?php include("part/footer.php")   ?>