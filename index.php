<?php
require_once __DIR__."/includes/app.php";


$data = db_create('users' , ['name' => 'anas5',
                     'email' => 'anas5.net',
                     'password' => '123']);

var_dump($data);



