<?php
    
    //include constant for SITEURL
    include('../config/constants.php');

    //distroy all session massages

    session_destroy();

    //rederecly to login page

    header('location:'.SITEURL.'admin/login.php');


?>