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


<html>
<head>
    <link href="addnotice.css" rel="stylesheet">
</head>
<div id="notice">
    <form action="notice.php" method="post" enctype="multipart/form-data">
        <div id="noticediv">
            <h3 style="margin-left: 250px;">Add Notice</h3>
        </div>
        <h3 style="margin-left: 70px;margin-top: 70px">Enter Notice Text:</h3>
        <input type="text" required="" style="margin-left: 220px;margin-top: -45px" name="message">

        <h3 style="margin-left: 70px;margin-top: 40px">Enter Hyperlink:</h3>
        <input type="text"style="margin-left: 220px;margin-top: -120px" name="hyperlink">


        <input type="submit" value="ok" style="margin-left: -300px;width: 70px;margin-top: 60px;">

        <input type="button" value="cancel" style="margin-left: 100px;margin-top: 60px">

    </form>
</div>
</html>