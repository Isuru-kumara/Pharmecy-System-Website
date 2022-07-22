<?php

use function PHPSTORM_META\elementType;

 include('part/menu.php');     ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update Category </h1>
        <br><br>
        <?php
            if (isset( $_GET['id'])) 
            {
                //get id and other details
                //echo "getting data";

                //GET THE ID SELECTED ONE
                $id =$_GET['id'];
                // create SQL quary to get details
                $sql= "SELECT * FROM tbl_category WHERE id =$id";

                 // the quary
                $res=mysqli_query($conn,$sql);

                 // cheack details are availbel or not
                $count = mysqli_num_rows($res);

                   if($count==1)// this work correclly
                    {
                        // get the ddetails
                        //echo 'admin availble';
                        $row= mysqli_fetch_assoc($res);

                        $title =$row['title'];
                        $current_image =$row['image_name'];
                        $featured =$row['featured'];
                        $active =$row['active'];

                        //


                        


                    }
                    else{
                        //go back to category page with massge;
                        $_SESSION['no-category-found'] ="<div class='erro'> category not found</div>";
                        //go back
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                    
                   
            }        

             else 
            {
                // go back to catagory manage page;
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            

        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="table-d">

                <tr>
                    <td> Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ?> ">
                    </td>
                </tr>
                
                <tr>
                    <td> current image: </td>
                    <td>
                        <?php
                            if($current_image !="")
                            {
                                //display imaeg
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="170px">


                                <?php
                            }
                            else{
                                //display massage
                                echo "<div class='erro'> image is not uploaded </div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td> New image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>featured</td>
                    <td>
                        <input <?php if($featured=="yes"){echo "checked" ;}?> type="radio" name="featured" value="yes">yes
                        <input <?php if($featured=="no"){echo "checked" ;}?> type="radio" name="featured" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>active</td>
                    <td>
                        <input <?php if($active=="yes"){echo "checked" ;}?> type="radio" name="active" value="yes">yes
                        <input <?php if($active=="no"){echo "checked" ;}?> type="radio" name="active" value="no">no
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    
                        <input type="submit" name="submit" value="update category" class="btn-submit-b">
                    </td>
                
                </tr>

            </table>


        </form>

        <?php
            if (isset($_POST['submit'])) {
                //get the value from form;


                $id =$_POST['id'];
                $title=$_POST['title'];
                $current_image =$_POST['current_image'];
                $featured =$_POST['featured'];
                $active = $_POST['active']; 

                //2 update new image if we want
                if(isset($_FILES['image']['name']))
                    {
                         $image_name=$_FILES['image']['name'];
                         
                         //check current image avalbel or not;
                         if ($image_name !="") 
                         {
                            //image avalble

                            //1.upload new image;
                            
                            //get new extention to our image
                            $ext =end(explode('.',$image_name));

                            //renmae the image
                            $image_name= "add_category" .rand(0000,9999).'.'.$ext;


                            $source_path =$_FILES['image']['tmp_name'];

                            $destination_path ="../images/category/".$image_name ; //wherew we want to sve phot & path added here

                            //image uploading php funtion
                            $upload= move_uploaded_file($source_path ,$destination_path);

                            //check image upload or not;

                            if ($upload==false) 

                            {                                        
                                //display session massage in add-category.php site;
                                $_SESSION['upload'] ="<div class='erro'> Failed to upload image / please give path of image </div>  ";

                                //go back to category page;
                                header('location:'.SITEURL.'admin/manage-category.php');

                                //stop the process
                                die();
                                        
                            }



                            //2.remove current image;
                            if($current_image !="")
                            {
                                $remove_path ="../images/category/".$current_image ;
                                $remove=unlink($remove_path);

                                //check image remove or not; 
                                if($remove == false)
                                {
                                    //set massge to displaya erro;
                                    $_SESSION['remove-current-img'] = " <div class='erro'> Faile to remove current image  </div>";
            
                                    //back to catagory page;
                                    header("location:".SITEURL."admin/manage-category.php");
            
                                    //stop the all process
                                    die();
                                }
                            }
                            

                         }else{

                            //image nor-avable
                            $image_name =$current_image;

                         }
                    }
                    else
                    {
                        $image_name =$current_image;
                    }

                //3.update the data base;
                $sql2 = " UPDATE tbl_category SET  

                        title ='$title',
                        image_name ='$image_name',
                        featured = '$featured',
                        active ='$active'

                        WHERE id =$id ";


                //4.run the SQL ;
                $res2= mysqli_query($conn,$sql2);

                //-cehck code run or not

                if($res2 == true ){
                    //catagory updated,
                    $_SESSION['updated-category'] = "<div class='success'> category updated succesfully </div>" ;
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else{
                    //not working well and redectly to manage category page;  

                    $_SESSION['updated-category'] = "<div class='erro'> Failed to update Category </div>" ;
                        //redierct
                    header('location:'.SITEURL.'admin/manage-category.php');
                }





            }
        ?>






    </div>
</div>


<?php include('part/footer.php');     ?>


