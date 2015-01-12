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
?>


<?php
require_once('connect.php');
$query='SELECT * FROM `contactus` ORDER BY date DESC';
$result=mysql_query($query);
while($row=mysql_fetch_assoc($result))
{
    $name=$row['name'];
    $message=$row['message'];
    $email=$row['email'];
    $date=$row['date'];
    echo 'Name:'.$name.'<br>';
    echo 'EMail:'.$email.'<br>';

    echo '<div id="d" style="">';
    echo 'Message:'.$message.'<br>';
    echo '</div>';


    echo 'Date:'.$date.'<br><hr>';
}
mysql_close($connect);

?>