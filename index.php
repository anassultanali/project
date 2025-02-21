<?php
require_once __DIR__."/includes/app.php";



$data = fetch_data('users' , 1);

var_dump($data);