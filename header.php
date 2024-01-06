<?php include("/xampp/htdocs/pharmacy-system/config/constants.php");
ob_start()?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Calisto Medilab</title>
    <meta charset="utf-8" name="viewport" content="width=device-width" initial scale="1.0">
    <meta name="keywords" content="pharmacy, medicine, tablets, pills, doctors, diseases, e-channelling">
    <meta name="description" content="This website helps people to buy medicines via online easily.">

    <!-- Favicon -->
    <link rel="icon" type="image/icon" href="img/logo.jpg" class="rounded-circle">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-6">
                <a href="" class="text-decoration-none">                   
                    <span class="h1 text-uppercase text-dark px-2 ml-n1"><i class="fa fa-medkit text-dark"></i> Calisto Medilab</span>
                </a>
            </div> 
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">

            <div class="col-lg-3 d-none d-lg-block">
                
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-5 py-lg-0 px-7">
                    <a href="" class="text-decoration-none d-block d-lg-none">                        
                        <span class="h1 text-uppercase text-light px-6 m3-n3" style="font-weight:800;">Calisto Medilab</span>                        
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-3">


                            <a href="<?php echo SITEURL;?>index.php" class="nav-item nav-link">Home</a>


                            <a href="<?php echo SITEURL; ?>Categories.php" class="nav-item nav-link">Categories</a>


                            <a href="<?php echo SITEURL; ?>Products.php" class="nav-item nav-link">Products</a>


                            <!--<a href="../main-font_end/Product details.php" class="nav-item nav-link">Product Details</a>   -->                         


                            <a href="<?php echo SITEURL; ?>Contact Us.php" class="nav-item nav-link">Contact Us</a>


                        </div>  
                        <div class="col-lg-4 col-6 text-left">
                            <form action="<?php echo SITEURL;?>search.php" method="POST">
                                <div class="input-group">
                                    
                                    <input type="search" name="search" placeholder="Search for products" class="form-control">
                                    <input type="submit" value="search"> 
                                    
           
                                </div>
                            </form>
                        </div>       
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End --> 
