<?php include("part/menu.php") ?>




<!-- main content selction starat     -->

<div class = "main-content" >
     <div class="wrapper">

          <h1>Admin-Management System</h1>
          </br>   

          <?php //$_SESSION massages are go with here;
               if(isset($_SESSION['add']))
               {
                    echo $_SESSION['add']; //Display the massage
                    unset($_SESSION['add']); //removing massage 
               }

               if ( isset($_SESSION['delete']))  
               {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
               }
               
               if (isset($_SESSION['update'])) 
               {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
               }

               if (isset($_SESSION['user-not-found'])) 
               {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
               }
               if (isset( $_SESSION['not-match'] )) 
               {
                    echo  $_SESSION['not-match'] ;
                    unset( $_SESSION['not-match'] );
               }
               if(isset($_SESSION['user-found']))
               {
                    echo $_SESSION['user-found'];
                    unset($_SESSION['user-found']);
               }

              
          ?>


          </br></br></br>
          <!-- Button to add admin  -->
          <a href="./add-admin.php" class="btn-primary"> Add New Admin </a>
</br></br>



          <table class="table-b">
               <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>

               </tr>
               <?php
                         //quary to get all admin
                    $sql="SELECT * FROM tbl_admin";

                    //execute the quary
                    $res = mysqli_query($conn,$sql);

                    //check whether the quary work or not;
                    if ($res==TRUE) {


                         // count rows to check whether we have data in databse or not;

                         $count =mysqli_num_rows($res); // funtion to get all the rows in databse
                         $user_id=1;


                         //cheack the number of rows
                         if ($count>0)
                         {
                              # we have data in databse
                              while ($rows =mysqli_fetch_assoc($res)) 
                              {
                                   //use while loop to get all the data from database;
                                   //and while loop run as long as we have data in database

                                   //get individual data
                                   $id=$rows['id'];
                                   $full_name =$rows['full_name'];
                                   $username =$rows['username'];

                                   //Display the value in our table

                                    ?>

                                        <tr>
                                             <td><?php echo $user_id++ ?></td>
                                             <td><?php echo $full_name ?></td>
                                             <td><?php echo $username ?></td>
                                             <td> 
                                                  <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id;?>" class="btn-changePW">Change Password</a>
                                                  <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">  Update admin  </a> &nbsp;
                                                  <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-delet">  Delete admin  </a>
                                                                                                    <!--in this case (?id) :- is the our GET method veriable    -->
                                             </td>
                                        </tr>
                                        




                                   <?php
                              }
                         }else

                         {
                              // we dont have data in databse
                         }
                    } 
                    
               ?>
               
          </table>

        





     </div>
</div>


<!-- main contain selection ends     -->



<?php include("part/footer.php")   ?>