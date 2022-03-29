<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'myhome');
//connect dataBase
$cnn = mysqli_connect(HOST, USER, PASS, DB) or die('unable to connect');
mysqli_query($cnn, "SET NAMES utf8");

$server_address = "http://192.168.43.144/myhome/";
