<?php

include "query.php";
$query = new query();

$id = $_POST['id'];
$userID = $_POST['userID'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$location = $_POST['location'];
$category = $_POST['category'];
$sellOrRent = $_POST['sellOrRent'];
$homeSize = $_POST['homeSize'];
$numberOfRooms = $_POST['numberOfRooms'];
$imagePath = $query->uploadFile($_FILES['image']);
$date = date("Y-m-d h:m");
$status = 0;
$imageInfo = $query->getImageBanner($id);

if ($userID != null &&
    $title != null &&
    $description != null &&
    $price != null &&
    $location != null &&
    $category != null &&
    $sellOrRent != null &&
    $homeSize != null &&
    $numberOfRooms != null) {


    if ($imagePath['state'])
        $query->removeFile($imageInfo['image']);
    else
        $imagePath['fileName'] = $imageInfo['image'];

    //edit banner
    $edit = $query->editBanner($id, $userID, $title, $description, $price, $location, $category, $sellOrRent, $homeSize, $numberOfRooms, $imagePath['fileName'], $date, $status);
    echo json_encode($edit);

} else
    echo "تمام فیلد ها را پر کنید";