<?php include('part/menu.php')?>



<div class="main-content">
     <div class="wrapper">

 

          <h1>ADD New Admin</h1>

          <br> <br>
          <?php
          if (isset($_SESSION['add'] )) // checking session set or not
          {
               echo $_SESSION['add']; //Display the massage
               unset($_SESSION['add']); //removing massage 
          }  
          ?>

          <form action="" method="post">

               <table class="table-c" >

                    <tr>
                         <td> Full Name: </td>
                         <td> <input type="text" name="full_name" id="" placeholder=" Enter your Name"></td>
                    </tr>
                    <tr>
                         <td>Username:</td>
                         <td> <input type="text" name="username" id="" placeholder=" your username"> </td>
                    </tr>

                    <tr>
                         <td> Password:</td>
                         <td> <input type="password" name="password" id="" placeholder=" your password"> </td>
                    </tr>

                    <tr>
                         <td colspan="2">

                         <input type="submit" value="Add Admin" name="submit" class="btn-submit">

                         </td>
                    </tr>

               </table>



          </form>


     </div>
</div>


<?php include("part/footer.php")?>

<?php
      //process the value from Form and save it in database

     // check the submit button click or not
     if ( isset($_POST['submit'])) {
          //echo "button is clicked";

          //get the data from form;
          $full_name =$_POST['full_name'];
          $username=$_POST['username'];
          $password= md5($_POST['password']); //password encription with md5()


          // SQL to save data in database;

          $sql= "INSERT INTO tbl_admin SET

               full_name = '$full_name',
               username ='$username',
               password = '$password'
          
          "; 

         // echo $sql; // cehck quary run or not


          //3. executing quary and saving data in database,

         $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

         //check whether data insert to database or not,
         if ($res==TRUE) {
                //data is inserted
               //echo "data is inserted";
               // ceate a session to display massge;
               $_SESSION['add'] ="<div class='success'> Admin Added Successfully  </div>";

               //redirect page;
               header("location:".SITEURL.'admin/admin-manage.php');

         }else{
               // data not inseted
               //echo "data is not inserted";
                    // ceate a session to display massge;
               $_SESSION['add'] ="Failed To Add Admin";

                    //redirect page;
               header("location:".SITEURL.'admin/add-admin.php');
         }




     }

?>  