<?php include("/xampp/htdocs/pharmacy-system/config/constants.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - food order system</title>


    <link rel="stylesheet" href ="/pharmacy-system/css/admin.css">
    <link rel="stylesheet" href = "/pharmacy-system/css/login.css">
    
</head>
<body>
    <div class="login">
        <h1 class="text-center">-Login page-</h1>
        <br><br>

        <?php
            if (isset($_SESSION['login']))  
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

        ?>

        <!-- create loging form    -->
        <form action="" method="post" class="text-center">
            <br><br>
            username: <br>
            <input type="text" name="username" placeholder="Enter your username">
            <br><br>

            password: <br>
            <input type="password" name="password" placeholder="Enter your password">
            <br><br><br>

            <input type="submit" value="login" name="submit" class="btn-primary">
            <br><br>
        </form>



        <!--  -->

        <!--  -->


        <!--  -->
    </div>
</body>
</html>

<?php
    // check submit button is work or not well;
    if (isset($_POST['submit'])) 
    {
        //process for log into sys;
        
        // 1.get data from form;
                //use echo to check this two; eg:- (echo $username = $_POST['username'];)
         $username = $_POST['username'];
         $password = md5($_POST['password']);
        
         //2. sql for check username and password are match with database;

         $sql="SELECT * FROM tbl_admin WHERE username ='$username' AND password ='$password'";
        
         // to  run sql quary;

         $res=mysqli_query($conn,$sql);  

         //4. count rows to check admin is availble or not;

            $count =mysqli_num_rows($res);

                if ($count ==1 ) {
                    //admin avalbel and login success massage;
                    $_SESSION['login'] = "<div class='success'> Login Successfull. </div>";

                    //redirecly to the home admin page
                    header('location:'.SITEURL.'admin/');
                } else 
                {
                    //admin avalbel and login success massage;
                        $_SESSION['login'] = "<div class='erro'> username or password are wrong. </div>";

                    //redirecly to the home admin page
                        header('location:'.SITEURL.'admin/login.php');
                }
                
    }
?>