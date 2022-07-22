<?php include('part/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1> Add Category </h1>
        <br><br>

        <?php // all the session massagess

            if (isset($_SESSION['add-category'])) 
            {
                echo $_SESSION['add-category'];
                unset($_SESSION['add-category']);
            }

            if (isset($_SESSION['upload'])) 
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>
        <br><br>

        <!--  add category form strat -->
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table-d" >
                    <tr>
                        <td> Title: </td>
                        <td>
                            <input style="height: 30px;" type="text" name="title" placeholder="Category Title">
                        </td>
                    </tr>
                    <tr>
                        <td> Select Image </td>
                        <td> 
                            <input type="file" name="image">
                        </td>

                    </tr>
                    <tr>
                        <td> Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="yes"> yes
                            <input type="radio" name="featured" value="no"> no
                        </td>
                    </tr>
                    <tr>
                        <td> Active: </td>
                        <td >
                            <input type="radio" name="active" value="yes"> yes
                            <input type="radio" name="active" value="no"> no
                        </td>
                    </tr>
                    
                    <tr>
                    
                        <td colspan="2" align="left" >
                            <input type="submit" value="add category" name="submit" class="btn-submit-b">

                        </td>
                    </tr>


                </table>
            </form>
                <!--  add category form end -->
            <?php
                if (isset($_POST['submit'])) 
                {
                   //echo "Clicked";

                   // 1. get value in catagory foorm;
                   $titile =$_POST['title'];

                   //2. for radio buttons we need to know is active or not 
                    if(isset($_POST['featured']))
                    {
                            //get the value
                            $featured = $_POST['featured'];
                    }
                    else
                    {
                            $featured ="no";
                    }

                    if (isset($_POST['active'])) 
                    {
                            //grt the walue
                            $active =$_POST['active'];

                    }
                    else
                    {
                        $active= 'no';
                    }

                    //check image file is selected or not;
                            print_r($_FILES['image']); 

                            //die();// breck the code in here;
                            if (isset($_FILES['image']['name'])) 
                            {
                                //upload image 
                                // we need image name,source path, destination path;
                                $image_name =$_FILES['image']['name'];
                                        
                                        //renamaing image name;
                                        //get new extention to our image
                                        $ext =end(explode('.',$image_name));

                                        //renmae the image
                                        $image_name= "add_category" .rand(0000,9999).'.'.$ext;


                                $source_path =$_FILES['image']['tmp_name'];

                                $destination_path ="../images/category/".$image_name ; //wherew we want to sve phot & path added here

                                //upload the image
                                $upload= move_uploaded_file($source_path ,$destination_path);

                                //check image upload or not;

                                if ($upload==false) 

                                    {                                        
                                        //display session massage in add-category.php site;
                                        $_SESSION['upload'] ="<div class='erro'> Failed to upload image / please give path of image </div>  ";

                                        //go back to category page;
                                        header('location:'.SITEURL.'admin/add-category.php');

                                        //stop the process
                                        die();
                                        
                                    }



                            } else {
                                //dont's upload image and image_name value as blank (image_name="")
                                $image_name ="";
                            }
                            

                    // create SQL quary to add data to databse

                    $sql= " INSERT INTO tbl_category SET
                        title ='$titile',
                        featured ='$featured',
                        image_name ='$image_name',
                        active ='$active' 
                    ";

                    // 3.execute SQL quary;

                    $res =mysqli_query($conn,$sql);

                    //check in the quary data are added or not 

                    if ($res==true) {
                        
                        // display quary work and data added to database
                        $_SESSION['add-category'] ="<div class='success'> Category added succesfully </div>";
                        
                        //display massge in site manage-category;
                        header('location:'.SITEURL.'admin/manage-category.php');




                    } else 
                    
                    {
                            //failed to add category to database;
                            $_SESSION['add-category']="<div class='erro'> Failed to add new Category </div>";

                            //display massge in site add-category ;
                            header('location:'.SITEURL.'admin/add-category.php');

                    }
                    

                
                } 

               


            ?>
    




    </div>
</div>

<?php include('part/footer.php'); ?>