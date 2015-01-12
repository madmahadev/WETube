<!DOCTYPE html>
<html>
<head>
    <style>
        .video{
            height: auto;
            background-color: yellow;
            overflow-x: auto;
            overflow-y: auto;
            border: 1px solid gray;
        }
        .video a:hover{

            color: red;
        }

    </style>
    <title>WEtube</title>
    <link href="deptcse.css" rel="stylesheet">
    <script type="text/javascript">



        function suggest()
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
                    document.getElementById('suggestion').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','search.php?query='+document.searchform.searchtext.value,'true');
            xmlhttp.send();
        }



    </script>
</head>
<body class="bdy">
<div id="heder">

    <a href="index.php"> <img src="backimages/heder.png"></a>
    <div id="block">
        <marquee>
            <h1>Civil Engineering Department</h1>
        </marquee>
    </div>

</div>


<div id="add" style="height: auto">

    <?php
    require_once('connect.php');
    $query='select * from notice ORDER BY id DESC';
    $result=mysql_query($query);
    $count=2;

    while($count!=0&&$row = mysql_fetch_assoc($result)) {

        $hyperlink = $row['hyperlink'];
        $message = $row['message']." ".$row['date'];

        echo '
    <marquee scrollamount="5">
    <a href="' . $hyperlink . ' ">
    ' . $message . '
    </a>
    </marquee>
    <br>
    ';
        $count--;
    }
    mysql_close($connect);
    ?>




</div>
<!-- start menubar -->
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
            <li><a href="contactus.php" onclick="loadcontacus();">CONTACT US</a></li>
            <li><a href="login.php">ADMIN-LOGIN</a> </li>



        </ul>
    </div>
</div>

<!-- end menubar-->


</body>
<hr>
<div id="subject">
    click on subject...<br />
    <?php

    if(@$connect=mysql_connect('localhost','root',''))
    {
        if(@mysql_select_db('wetube'))
        {
            $query='select subject from civil_sub';
            $query_run=mysql_query($query);


            while(@$query_row=mysql_fetch_assoc($query_run))
            {


                echo('
              <div class="subjects">
                <a href="civil.php?link_name='.$query_row['subject'].'">->'.$query_row['subject'].'</a><br>
               </div>
               ');
            }

        }
    }

    @mysql_close($connect);

    ?>

</div>

<div id="vdlink">
    Video links of subject...
    <div class="videolink">
        <?php
        //echo('Welcome to database')

        $sub_name="";

        if(isset($_GET['link_name']))
        {
            if(!empty($_GET['link_name'])) {
                $sub_name = $_GET['link_name'];

                require('connect.php');

                $query = 'select video_name from civil_' . $sub_name;
                $query_run = mysql_query($query);

                while (@$query_row = mysql_fetch_assoc($query_run)) {
                    $name = $query_row['video_name'];
                    $link = 'videos/civil/' . $sub_name . '/' . $name . '&link_name=' . $sub_name;

                    echo('
                    <div class="video">

                <a href="civil.php?video_name=' . $link . '">' . $name . '</a><br>
                </div>
               ');
                }
            }
        }

        ?>



    </div>

</div>
<div class="search">
    <form name="searchform" action="<?php echo'civil.php'?>" method="get">
        <input type="text" name="searchquery" style="width: 700px;height: 30px" placeholder="search video..Enter subject name if known" title="query" style="text-align: left;font-size: 20px;" required="" onkeyup="suggest()" name="searchtext">
        <input type="submit" style="width: 50px;height: 35px;margin-left:-50px;background-color: #256cdc"  name="submit" value="search">
    </form>
</div>



<div id="suggestion">
    <?php
    if(isset($_GET['searchquery'])&&!empty($_GET['searchquery']))
    {
        $searchquery=$_GET['searchquery'];
        $dept_name='civil';

        require_once("searchvideo.php");
    }
    ?>
</div>

<div id="playboard">

    <?php
    if(isset($_GET['video_name']))
    {
        $video_name=$_GET['video_name'];

        if(!empty($video_name))
        {
            $video_name=str_replace(' ','%20',$video_name);
            echo '<video src='.$video_name.' type="video/mp4" controls></video>';

        }
    }
    else
    {
        echo '<video src="SUPER%20Motivational%20Speech%20by%20Robin%20Sharma%20_%20Inspirational%20Video%20Mastery.mp4"controls></video>';
    }
    ?>

</div  >

</body>
</html>
<?php
?>