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
    <title>Admin Panel</title>
    <link href="adminlogin.css" rel="stylesheet">
    <script type="text/javascript">
        window.onbeforeunload=function(){
            alert("cloasing");
            return "do you want to close..";

        };
        function closing()
        {
            alert("Cloasing page...");
        }
        </script>
</head>
<body onbeforeunload="closing()">
<div id="header">
    <a href="index.php"><img src="backimages/heder.png"></a>
    <div id="logout">
        Admin Logged in <?php echo $username;?> <a href="logout.php">logout</a>



    </div>
</div>
    <div id="activity">

        <div id="Leftwindow">

            <div id="Buttons">
                <div id="b1" style="margin-top: 20px;margin-left: 50px;width: auto;height: 30px;"><a href="Adminlogin.php?link=addvideo.php" >ADD VIDEO</a></div><br><br>
                <div id="b2" style="margin-top: 20px;margin-left: 50px;width: auto;height: 30px;"><a href="Adminlogin.php?link=addadv.php">ADD ADVERTISE</a></div> <br><br>
                <div id="b3" style="margin-top: 20px;margin-left: 50px;width:auto;height: 30px;"><a href="Adminlogin.php?link=addnotice.php">ADD NOTICE</a></div><br><br>
                <div id="b4" style="margin-top: 20px;margin-left: 50px;width:auto;height: 30px;"><a href="Adminlogin.php?link=addsub.php">Add NEW SUBJECT</a></div><br><br>
            </div>
        </div>
        <div id="ActivityPanel">
            <div id="ActMessage">
                <h1 style="margin-left: 250px">Activity Panel</h1>
            </div>

            <div id="mainpanel">
                <?php
                if(isset($_GET['link']))
                {
                    $link=$_GET['link'];

                }
                else
                    $link='addvideo.php';
                require($link);
                ?>

            </div>

        <div id="Rightwindow">
            <div id="Message">
                <h1 style="margin-left: 100px">Messages</h1>
            </div>
            <hr>
            <?php
            require('message.php');
            ?>
        </div>
    </div>
</body>
</html>