<?php
require_once __DIR__."/includes/app.php";

// db_create($table,[]);
// update_data($table,[],$id);
// delete_data($table,$id);
// fetch_data($table,$id);
// first_data($table,$query);


$users = get_data('users' ,'');

if ($users['num'] > 0){
   while($row = mysqli_fetch_assoc($users['query'])){
       echo $row['email']."<br>";
   }
}

mysqli_close($GLOBALS['conn']);
