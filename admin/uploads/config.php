<?php

    //$host = "mysql7001.site4now.net";
    $host = "localhost:3306";
    
    //$database = "db_a436b3_waterdb";
    $database = "sitksaho_watercontaniersDb";
    
    //$tablename = "contacts";
    
    //$dbuser = "a436b3_waterdb";
    $dbuser = "sitksaho_amrrabbie";
    
    
    //$dbpass="mcsd1980";
    $dbpass="mcsd@1980";
    
    
    $con = mysqli_connect($host, $dbuser, $dbpass, $database);
    
    mysqli_set_charset($con, "utf8");
   



