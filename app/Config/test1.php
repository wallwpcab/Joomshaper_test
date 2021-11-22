<?php
require __DIR__ .'/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DB;

// //INSERT 
 DB::table('users') ->insert([
    "name" => 'Tonmoy',
    "email" => 'tonmoy@gmail.com',
    "name"  => 'Wallie',
    "password" => 'pass123',
    "created_at" => date("Y-m-d h:i:s")
]);
?>