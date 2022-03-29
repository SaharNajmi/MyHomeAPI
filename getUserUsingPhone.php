<?php

include 'query.php';
$query = new query();
$phoneNumber = $_GET['phoneNumber'];
if ($_GET['phoneNumber'] != "") {
    $user = $query->getUserByPhone($phoneNumber);
    echo json_encode($user);
} else {
    echo "please enter by application";
}
