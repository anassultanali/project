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
        return $data;
    }
 }
 
  /**
 * search for multiple row from database
 * 
 * @param string $table
 * @param string  $query
 */

 if (!function_exists('get_data')) {
    function get_data(string $table , string $query) {
        $query = mysqli_query($GLOBALS['conn'] ,"SELECT * FROM ".$table." ".$query);
        $num = mysqli_num_rows($query);
        return [
            'query'=> $query,
            'num'=> $num
        ];
    }
 }


  
  /**
 * search for multiple and pagination row from database
 * 
 * @param string $table
 * @param string
 */

 if (!function_exists('db_pagination')) {
    function db_pagination(string $table , string $query, int $limit=15 ,string $orderby = 'asc') {

        if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ) {
            $current_page = $_GET['page'] -1 ;
        }else{
            $current_page = 0 ;
        }


        $query_count = mysqli_query($GLOBALS['conn'] ,"SELECT COUNT(id)  FROM ".$table." ".$query);
        $count = mysqli_fetch_row($query_count);
        $total_records = $count[0];
        
        $start = $current_page * $limit;
        $total_page = ceil($total_records / $limit);

        var_dump($total_records);
        $query = mysqli_query($GLOBALS['conn'] ,"SELECT * FROM ".$table." ".$query." order by id ".$orderby." LIMIT {$start},{$limit}");
        $num = mysqli_num_rows($query);
        return [
            'query'=> $query, 
            'num'=> $num
        ];
    }
 }
