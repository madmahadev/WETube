<?php

@session_start();
if(isset($_SESSION['id'])&&!empty($_SESSION['id']))  //if user is not logged in and requestiong to access database
{
    $username = $_SESSION['id'];
}
else {
    echo "Unathorised access...";
    die();
}
  if(isset($_FILES['file']['name'])&&isset($_POST['hyperlink']))
  {
      $hyperlink=$_POST['hyperlink'];
      $imgname = $_FILES['file']['name'];
      $type=$_FILES['file']['type'];
      $temp_name=$_FILES['file']['tmp_name'];


   if(!empty($imgname))
   {
       if($type!='image/jpeg')
       {
           echo 'file type require to be image/jpeg';
           //header('location:addadv.php?error=Image file should be image jpeg');
           die();

       }
       require_once('connect.php');
       $query='insert into advimage VALUES (\'\',\''.$imgname.'\',\''.$hyperlink.'\')';
       mysql_query($query);
       $target='images\\advertise\\'.$imgname;
       move_uploaded_file($temp_name,$target);
       echo'advertize uploaded successfuly....';
   }
      else
      {
          header('location:addadv.php?error=needto select file');
      }

  }


//}
//else
//{
    //header('location:login.php?error=need to login first');
//}