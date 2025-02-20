<?php
require_once __DIR__."/includes/app.php";


$update = update_data('users' ,['name'=>'yasser',
            'email'=>'yasser@gmail.com',
            'password'=>'1234'],3);
var_dump($update);


