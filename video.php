<?php
session_start();
if(isset($_SESSION['id'])&&!empty($_SESSION['id']))  //if user is not logged in and requestiong to access database
{
    $username = $_SESSION['id'];
}
else {
    echo "Unathorised access...";
    die();
}
?>


<?php

if(isset($_FILES['file']['name']))
{
    $name=$_FILES['file']['name'];
    $tempname=$_FILES['file']['tmp_name'];
    $dept=$_POST['dept'];
    //echo $dept;
    $sub=$_POST['subject'];
    //echo $sub;
    $type=$_FILES['file']['type'];
    $size=$_FILES['file']['size'];
    $desc=$_POST['description'];
    $target='videos/'.$dept.'/'.$sub.'/'.$name;
    //echo $type.'<br>';
    //echo $dept.'<br>';
    if(file_exists($target))
    {
    echo'video file already exists';
        //header('location:adminlogin.php?success=video uploaded successfully!');
        die();
    }
}
    if(!empty($name))
    {

        if ($type =='video/mp4')
        {
            require_once('connect.php');
            $query='insert into '.$dept.'_'.$sub.' values(\'\',\''.$name. '\',\''.$desc.'\')';
            //echo $query;
            if (@move_uploaded_file($tempname, $target))
            {
                 mysql_query($query);
                echo "file uploaded successfuly....";
                mysql_close($connect);

               // header('location:adminlogin.php');
            }
            else
            {
                echo "fail to upload";
            }
        }
        else
        {
            echo  ('only  video/mp4 files arwe allowed..');
        }
    }
    else
    {
        echo "please select file to upload";

    }


?>
