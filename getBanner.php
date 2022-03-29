<?php
include 'query.php';
$query = new query();

$category = $_GET['category'];
$sellOrRent = $_GET['sellOrRent'];
$phone = $_GET['phoneNumber'];
$price = $_GET['price'];
$homeSize = $_GET['homeSize'];
$numberOfRooms = $_GET['numberOfRooms'];

if (!empty($_GET) &&
    $sellOrRent != "" &&
    $category != "" &&
    $phone != "" &&
    $price != "" &&
    $homeSize != "" &&
    $numberOfRooms != "") {

    $userId = $query->getUserIDByPhone($phone);

    if ($userId == "all")
        //without filter
        $query1 = "";
    else
        $query1 = "userID=$userId and";
    if ($category == 0)
        $query2 = "";
    else
        $query2 = "category=$category and";

    if ($sellOrRent == 0)
        $query3 = "";
    else
        $query3 = "sellOrRent=$sellOrRent and";

    if ($price == "all")
        $query4 = "";
    else
        if ($price <= 1000000000)
            $query4 = "price<=$price and";
        else
            //قیمت بالای یک میلیارد
            $query4 = "price>$price and";

    if ($homeSize == 0)
        $query5 = "";
    else
        if ($homeSize <= 250)
            $query5 = "homeSize<=$homeSize and";
        else
            //خانه های بالای 250 متر
            $query5 = "homeSize>$homeSize and";

    if ($numberOfRooms == 0)
        $query6 = "";
    else
        if ($numberOfRooms == 1 || $numberOfRooms == 2)
            //یک اتاق یا دو اتاق داشته باشه
            $query6 = "numberOfRooms=$numberOfRooms and";
        else
            //اتاق های بیشتر از 3
            $query6 = "numberOfRooms>=$numberOfRooms and";


    $sql = "select * from banners where $query1 $query2  $query3 $query4 $query5 $query6 status=1  order by id DESC";

    echo json_encode($query->getBanner($sql));
} else
    echo "null";

