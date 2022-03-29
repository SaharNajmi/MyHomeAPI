<?php

include "query.php";
$query = new query();

$phonenumber = $_POST['phoneNumber'];
$password = $_POST['password'];

if ($phonenumber != null && $password != null) {
    $loginState = $query->login($phonenumber, $password);
    echo json_encode($loginState);
} else
    echo "empty";