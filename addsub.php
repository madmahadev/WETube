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
    <link href="addsub.css" rel="stylesheet">
</head>
<div id="subject">
    <form action="subject.php" method="post" enctype="multipart/form-data">
      <div id="subjectdiv">
       <h3 style="margin-left: 230px">Add Subject</h3>
      </div>
        <h3 style="margin-left: 70px;margin-top: 70px">Select Department</Department></h3>
        <select name="dept" style="margin-left: 230px;margin-top:-44px">
            <option name=" ">Select Department</option>
            <option name="cse">Computer Science And Enginnering</option>
            <option name="it">Information Technology</option>
            <option name="mech">Mechanical Engineering</option>
            <option name="civil">Civil Engineering</option>
            <option name="electrical">Electrical Engineering</option>
            <option name="electronics">Electronics Engineering</option>
        </select>

        <h3 style="margin-left: 70px">Enter Subject:</h3>
        <input type="text" style="margin-left: 230px;margin-top: -123px" name="subject">

        <input type="submit" value="ok" style="margin-left: -300px;width: 70px;margin-top: 50px;">

        <input type="button" value="cancel" style="margin-left: 80px;margin-top: 60px">

    </form>
</div>
</html>