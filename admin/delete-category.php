<?php

    //include constant.php file;
    include("C:/xampp/htdocs/food-order/config/constants.php");


    //get id of the admin we want to delete;

    if (isset( $_GET['id']) AND isset($_GET['image_name']) ) 
    {
           //get id of the admin we want to delete;

            $id =$_GET['id'];
            $image_name =$_GET['image_name'];

            //remove the image file is it availabele;
            if ($image_name !="") 
            {
                //image avalabel so remive it;
                //get path of image;
                $path ="../images/category/".$image_name;

                // remove the image;
                $remove =unlink($path); //using unlink delete image file;
                   //if image failed to remove;
                    if($remove == false)
                    {
                        //set massge to displaya erro;
                        $_SESSION['remove'] = " <div class='erro'> Faile to remove category image  </div>";

                        //back to catagory page;
                        header("location:".SITEURL."admin/manage-category.php");

                        //stop the all process
                        die();
                    }

            } 
           

         
             

            // create SQL quary to delete category;
            $sql ="DELETE FROM tbl_category WHERE id=$id " ;

            //excute the quary

            $res= mysqli_query($conn,$sql);

            if ($res==true) {

                //quary massage sussfully deleted category
                //echo "Admin deleted ";
                // create session to display massage
                $_SESSION['delete-category'] = "<div class='success'> Category Delete Successfully  </div>";

                //re-direct massage into manage admin page;

               header("location:".SITEURL.'admin/manage-category.php');



            }
            else
           {
                //query is not working 
                //echo " failed to delete admin ";
               $_SESSION['delete-failed'] ="Failed To Delete Category";

                //re-direct massage into manage admin page;

                header("location:".SITEURL.'admin/manage-category.php');
            }


                //get massage to manage admin page (sussfully delete or not);

    } 
    else 
    {
        #rederecly to the category page;


    }
    

    

    



   



