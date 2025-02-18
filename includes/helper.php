<?php


/**
 * Insert data in database
 * 
 * @param string $table
 * @param array $data
 * @return array as assoc 
 */

if (!function_exists('db_create')) {
    function db_create(string $table,array $data) {
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
        $id = mysqli_insert_id($GLOBALS['conn']);
        $first = mysqli_query($GLOBALS['conn'],"SELECT * FROM ".$table." WHERE id=".$id);
        $data =  mysqli_fetch_assoc($first);
        mysqli_close($GLOBALS['conn']);
        return $data;
    }
}

/**
 * Update data in database
 * 
 * @param string $table
 * @param array $data
 * @param int $id 
 * 
 * @return array as assoc
 */