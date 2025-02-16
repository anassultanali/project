<?php 

    $DBinfo = include __DIR__.'/DBinfo.php' ;
    
    $conn = mysqli_connect($DBinfo['servername'],
                           $DBinfo['username'],
                           $DBinfo['password'],
                           $DBinfo['DBname']);
    if ($conn) {
        // echo "Connected";
    }else{
        die(mysqli_connect_error());
    }
    
    mysqli_query($conn ,"DELETE FROM users WHERE id =3 " );
    mysqli_query($conn,"UPDATE users SET id = 3  WHERE email ='php3.com'");
    $sql = "SELECT  id,name,email FROM users" ;
    $query = mysqli_query($conn , $sql) ;
    $num = mysqli_num_rows($query);
    if ($num > 0) {
        while($row = mysqli_fetch_assoc($query)){
            echo $row['id'].' - '.$row['name'].' - '.$row['email']."<br>";
        }
    }

    // var_dump($query) ;

?>