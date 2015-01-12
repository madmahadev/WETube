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
//if(isset($_SESSION['user'])&&!empty($_SESSION['user']))  //if user is not logged in and requestiong to access database
//{

        $msg = $_POST['message'];
        $link = $_POST['hyperlink'];
        if (!empty($msg)) {
            require_once('connect.php');
            $query = 'insert into notice values(' . '\'\'' . ',\'' . $msg . '\', \''. $link .'\', NOW())';

            if(@mysql_query($query)) {
                echo 'notice placed successfuly...!';
            }
            else{
                echo'fail to add notice...!';
            }
            mysql_close($connect);
        }

//}
//else
//{
  //  header('location:login.php');
//}
?>