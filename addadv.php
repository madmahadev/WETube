<?php
@session_start();
if(isset($_SESSION['id'])&&!empty($_SESSION['id']))  //if user is not logged in and requestiong to access database
{
    $username = $_SESSION['id'];
}
else{
    echo "Unathorised access...";
die();
}
?>


<html>
<head>
    <link href="advertise.css" rel="stylesheet">
</head>
<div id="advertisement">
    <form action="adv.php" method="post" enctype="multipart/form-data">
        <div id="advertisementdiv">
            <h3 style="margin-left: 230px">Add Advertisement</h3>
        </div>
      Upload Image:<input type="file" name="file" required="" value="browse" style="margin-top:50px;margin-left:10px">

         <h3> Enter hyperlink:</h3>
            <input type="text" name="hyperlink"required="" style="margin-left: 150px;margin-top: -123px">

            <input type="submit" value="ok" style="margin-left:-200px;width: 70px;margin-top: 50px;">

            <input type="button" value="cancel" style="margin-left: 80px;margin-top: 60px">

    </form>
</div>
</html>