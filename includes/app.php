 <?php

    $DBinfo = include __DIR__.'/../config/DBinfo.php' ;
    
    $conn = mysqli_connect($DBinfo['servername'],
                           $DBinfo['username'],
                           $DBinfo['password'],
                           $DBinfo['DBname']);
    if (!$conn) {
        die("Connection failed".mysqli_connect_error());
    }
    
    include __DIR__."/helper.php" ;
 
mysqli_close($conn);