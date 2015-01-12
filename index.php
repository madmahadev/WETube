<!DOCTYPE html>
<html>
<head>
    <title>WEtube</title>
    <link href="index.css" rel="stylesheet">
    <script type="text/javascript">
        function loadcontacus()
        {
            if(window.XMLHttpRequest)
            {
                xmlhttp=new XMLHttpRequest();
            }
            else
            {
                xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
            }
            xmlhttp.onreadystatechange=function()
            {
                if(xmlhttp.readyState==4&&xmlhttp.status==200)
                {
                    document.getElementById('mainbody').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','contactus.php','true');
            xmlhttp.send();
        }
    </script>
</head>
<body class="bodynav">
<div class="wrapper">
    <div id="hederimg">

        <a href="index.php">  <img src="backimages/heder.png"></a>
        <div id="clg">
        <marquee><h1>Walchand Educational Tube....Walchand collage of engineering, Sangli</h1></marquee>
        </div>
    </div>
    <div class ="navbar">


        <div id="menubar">
            <ul id="menu">

                <li><a href="index.php">HOME</a> </li>
                <li><a href="#">DEPARTMENTS</a>
                    <ul>
                        <li><a href="cse.php">Computer Science And Engineering</a> </li>
                        <li><a href="it.php">Information Technology</a> </li>
                        <li><a href="mech.php">Mechanical Engineering</a> </li>
                        <li><a href="civil.php">Civil Engineering</a> </li>
                        <li><a href="electrical.php">Electrical Engineering</a> </li>
                        <li><a href="electronics.php">Electronics Engineering</a> </li>


                    </ul>
                </li>
                <li><a href="aboutus.html">ABOUT US</a> </li>
                <li><a href="contactus.php">CONTACT US</a></li>
                <li><a href="login.php">ADMIN-LOGIN</a> </li>



            </ul>
        </div>
    </div>

    <div id="mainbody">
        <!-- <div id="slider"> -->


        <div id="slider">
            <video src="SUPER%20Motivational%20Speech%20by%20Robin%20Sharma%20_%20Inspirational%20Video%20Mastery.mp4"controls="controls"></video>
        </div>

        <div id="maininfo">

            <p>

                Push yourself to do more and to experience more.<br> Harness your energy to start expanding your dreams.<br> Yes, expand your dreams.<br> Don't accept a life of mediocrity when you<br> hold such infinite potential within the fortress of your mind.<br> Dare to tap into your.
                <br>-Robin S. Sharma, The Monk Who Sold His Ferrari.

            </p>
        </div>





    </div>



    <div id="imgdiv">

        <div class="pd">

            <a href="cse.php"><img  src="linkimg/cse.jpg" title="Computer science and Engineering"> </a>
            <!-- <div class="imgtext">Computer science and engineering</div> -->
            <a href="it.php"><img src="linkimg/it.jpg" title="Information Technology"> </a>

            <a href="electronics.php"><img src="linkimg/entc.jpg" title="Electronics And Telicommunication Engineering" > </a>


        </div>
        <div class="pd">

            <a href="mech.php"><img src="linkimg/mech.jpg"  title="Mechanical Engineering"></a>
            <a href="civil.php"><img src="linkimg/civil.jpg" title="Civil Engineering"></a>
            <a href="electrical.php"><img src="linkimg/electrical.jpg" title="Electrical Engineering"></a>

        </div>


    </div>



</div>
<?php
require_once('connect.php');
$query='select * from advimage ORDER BY id DESC';
$result=@mysql_query($query);
$row=@mysql_fetch_assoc($result);
$source='images/advertise/'.$row['image'];
$hyperlink=$row['hyperlink'];
?>
<div class="homeleftadd" style="background-image: url(<?php echo$source; ?>);width:255px;height: 325px;background-size: cover;">
    <?php
      echo  '
    <marquee scrollamount="1">
    <a href="'.$hyperlink.'">
    <img src="'.$source.'" style="width:255px;
    height: 325px;">
    </a>
    </marquee>
     ';
    mysql_close($connect);
    ?>

</div>
<div class="homerightadd" style="background-image: url(<?php echo$source; ?>);width:255px;height: 325px;background-size: cover">
    <?php
    echo  '
    <marquee scrollamount="1">
    <a href="'.$hyperlink.'">
    <img src="'.$source.'" style="width:255px;
    height: 325px;">
    </a>
    </marquee>
     ';
    ?>

</div>



<div class="footer">Designe and Developed By <a href="www.facebook.com/mahadevvyavahare"> Mahadev Vyavahare</a>And Team...

</div>


</body>
</html>