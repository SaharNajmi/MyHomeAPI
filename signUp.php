<?php

include "query.php";
$query = new query();

$phoneNumber = $_POST['phoneNumber'];
$username = $_POST['username'];
$password = $_POST['password'];
$imageProfile = "";

//upload image
if (!empty($_FILES['image']['name'])) {
    //get image name
    $content = $_FILES['image']['tmp_name'];

    //create random file name
    $nameFile = 'images/' . date("y-m-d-g-i-s-") . rand() . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    //Replaces new image with old image
    if ($_FILES['image']['error'] == 0 && move_uploaded_file($content, $nameFile)) {
        $imageProfile = $nameFile;
    }

} else {
    $imageProfile = "";
}

//sign up
if ($phoneNumber != null && $username != null && $password != null) {
    $sinUpState = $query->signup($phoneNumber, $username, $password, $imageProfile);
    echo json_encode($sinUpState);
} else
    echo "تمام فیلد ها را پر کنید";