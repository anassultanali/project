<?php
require_once __DIR__."/includes/app.php";



$data = first_data('users' ,"WHERE email LIKE '%.net%' ");

var_dump($data);