<?php



if (!function_exists('db_create')) {
    function db_create($table,array $data) {
        $sql="INSERT INTO ".$table;
        $columns ="";
        $values = "";

        foreach ($data as $key => $value) {
            $columns .= $key."," ;
            $values .= " '".$value."',";
        }
        $columns = rtrim($columns,",");
        $values = rtrim($values,",");
        $sql .= " (". $columns .") VALUES (" .$values. ");";
        
        $query = mysqli_query($GLOBALS['conn'],$sql);
        return mysqli_insert_id($GLOBALS['conn']);

    }
}

echo db_create('users' , ['name' => 'anas2' ,
                     'email' => 'anas2.net',
                     'password' => '123']);