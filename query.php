<?php

class query
{
    private $cnn = null;
    private $Address = "";

    public function __construct()
    {
        include './connector.php';
        $this->cnn = $cnn;
        $this->Address = $server_address;
    }

    public function login($phonenumber, $password)
    {
        $sql = "select * from users where phonenumber='$phonenumber' and password='$password'";

        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);
        $ex = array();
        if ($row != null && $email = $row['phonenumber'] && $password = $row['password'])
            $ex['state'] = true;
        else
            $ex['state'] = false;

        return $ex;
    }

    public function signup($phonenumber, $username, $password, $imageProfile)
    {
        $sql = "insert into users (phonenumber,username,password,image)values('$phonenumber','$username', '$password','$imageProfile')";

        if (mysqli_query($this->cnn, $sql))
            $ex['state'] = true;
        else
            $ex['state'] = false;

        return $ex;
    }

    public function editUser($id, $phoneNumber, $username, $newPassword, $imageProfile)
    {
        $sql = "update users set phonenumber='$phoneNumber',username='$username',password='$newPassword',image='$imageProfile' where id='$id'";

        if (mysqli_query($this->cnn, $sql))
            $ex['state'] = true;
        else
            $ex['state'] = false;

        return $ex;
    }

    public function getImageProfile($id)
    {
        $sql = "select * from users where id=$id ";

        $result = mysqli_query($this->cnn, $sql);

        $row = mysqli_fetch_assoc($result);
        $ex['image'] = $row['image'];

        return $ex;
    }

    public function getImageBanner($id)
    {
        $sql = "select * from banners where id=$id ";

        $result = mysqli_query($this->cnn, $sql);

        $row = mysqli_fetch_assoc($result);
        $ex['image'] = $row['image'];

        return $ex;
    }

    public function getUserByPhone($phoneNumber)
    {
        $sql = "select * from users where phonenumber='$phoneNumber'";

        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);
        $user = array();
        if (mysqli_query($this->cnn, $sql)) {
            $user['id'] = intval($row['id']);
            $user['username'] = $row['username'];
            $user['password'] = $row['password'];
            $user['phone'] = $row['phonenumber'];
            $user['image'] = $row['image'];

        }
        return $user;
    }

    public function getBanner($sql)
    {
        $result = mysqli_query($this->cnn, $sql);
        $export = array();
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $ex = array();
            $ex['id'] = intval($row['id']);
            $ex['userID'] = intval($row['userID']);

            $user = $this->getUserByUserId($ex['userID']);
            $ex['phone'] = $user['phonenumber'];
            $ex['username'] = $user['username'];
            $ex['userImage'] = $user['image'];

            $ex['title'] = $row['title'];
            $ex['description'] = $row['description'];
            $ex['price'] = number_format($row['price']);
            $ex['location'] = $row['location'];
            $ex['category'] = $row['category'];
            $ex['sellOrRent'] = $row['sellOrRent'];
            $ex['homeSize'] = intval($row['homeSize']);
            $ex['numberOfRooms'] = intval($row['numberOfRooms']);
            $ex['bannerImage'] = $row['image'];
            $ex['status'] = intval($row['status']);

            //بدست آوردن تعداد دقیقه های سپری شده از آن تاریخ و ساعت
            $old = strtotime($row['date']);
            $new = ceil((time() - $old) / 60);
            $ex['date'] = $new;

            $export[$counter] = $ex;
            $counter++;
        }

        return $export;
    }

    public function deleteBanner($id)
    {
        $sql = "DELETE FROM banners WHERE id=$id";

        if (mysqli_query($this->cnn, $sql))
            $ex['state'] = true;
        else
            $ex['state'] = false;

        return $ex;
    }

    public function addBanner($userId, $title, $desc, $price, $location, $cate, $sellOrRent, $homeSize, $numberOfRooms, $image, $date, $status)
    {
        $sql = "insert into banners(userID,title,description,price,location,category,sellOrRent,homeSize,numberOfRooms,image,date,status) values ('$userId','$title','$desc','$price','$location','$cate','$sellOrRent','$homeSize','$numberOfRooms','$image','$date','$status')";
        if (mysqli_query($this->cnn, $sql))
            $ex['state'] = true;
        else
            $ex['state'] = false;

        return $ex;
    }

    public function editBanner($id, $userId, $title, $desc, $price, $location, $cate, $sellOrRent, $homeSize, $numberOfRooms, $image, $date, $status)
    {
        $sql = "update banners set userID='$userId', title='$title',description='$desc',price='$price',location='$location',category='$cate',sellOrRent='$sellOrRent',homeSize='$homeSize',numberOfRooms='$numberOfRooms',image='$image',date ='$date',status='$status' where id='$id'";
        if (mysqli_query($this->cnn, $sql))
            $ex['state'] = true;
        else
            $ex['state'] = false;

        return $ex;
    }

    public function getUserIDByPhone($phone)
    {
        $sql = "select * from users where phonenumber='$phone'";
        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);

        return intval($row['id']);
    }

    public function getUserByUserId($id)
    {
        $sql = "select * from users where id='$id'";
        $result = mysqli_query($this->cnn, $sql);
        $row = mysqli_fetch_array($result);


        $export = array();
        $export['phonenumber'] = $row['phonenumber'];
        $export['username'] = $row['username'];
        $export['image'] = $row['image'];
        return $export;
    }

    public function uploadFile($file)
    {
        $path = "images/";
        $result = null;
        //create random file name
        $fileName = date("y-m-d-g-i-s-") . rand() . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
        if ($path != null && $path != "") {
            //get file name
            if (is_uploaded_file($file['tmp_name'])) {
                //save file
                if (move_uploaded_file($file['tmp_name'], $path . $fileName)) {
                    $result['state'] = true;
                    $result['fileName'] = $path . $fileName;
                }
            }
        }
        return $result;
    }

    public function removeFile($path)
    {
        //Replaces new image with old image
        $FileName = $path;
        $FileHandle = fopen($FileName, 'w') or die("cant open file");
        fclose($FileHandle);
        unlink($FileName);
    }

}
