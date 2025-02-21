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
if (!function_exists('update_data')) {
    function update_data(string $table ,array $data ,int $id){
        $sql="update ".$table." set ";
        $column_value ="";
       

        foreach ($data as $key => $value) {
            $column_value .= $key."='".$value."'," ;
        }
        $column_value = rtrim($column_value,",");
        $sql .= $column_value." where id=".$id;
        
        $query = mysqli_query($GLOBALS['conn'],$sql);
        $first = mysqli_query($GLOBALS['conn'],"SELECT * FROM ".$table." WHERE id=".$id);
        $data =  mysqli_fetch_assoc($first);
        mysqli_close($GLOBALS['conn']);
        return $data;

    }

}


/**
 * delete data from database
 * 
 * @param string $table
 * @param int $id
 *   
 */

 if (!function_exists('delete_data')) {
    function delete_data(string $table , int $id) {
        $query = mysqli_query($GLOBALS['conn'] ,"DELETE FROM ".$table." WHERE id = ".$id);
        mysqli_close($GLOBALS['conn']);
        return $query;
    }
 }


/**
 * fetch single row from database
 * 
 * @param string $table
 * @param int id
 */

 if (!function_exists('fetch_data')) {
    function fetch_data(string $table , int $id) {
        $query = mysqli_query($GLOBALS['conn'] ,"SELECT * FROM ".$table." WHERE id = ".$id);
        $data = mysqli_fetch_assoc($query);
        mysqli_close($GLOBALS['conn']);
        return $data;
    }
 }

 /**
 * search for single row from database
 * 
 * @param string $table
 * @param string  $query
 */

 if (!function_exists('first_data')) {
    function first_data(string $table , string $query) {
        $query = mysqli_query($GLOBALS['conn'] ,"SELECT * FROM ".$table." ".$query);
        $data = mysqli_fetch_assoc($query);
        mysqli_close($GLOBALS['conn']);
        return $data;
    }
 }
 