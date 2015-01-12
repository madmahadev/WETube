<?php
session_start();
if(isset($_SESSION['id'])&&!empty($_SESSION['id']))  //if user is not logged in and requestiong to access database
{
    $username = $_SESSION['id'];
}
else
    echo "Unathorised access...";
die();
?>




<html>
<title></title>
<head>
    <script type="text/javascript">
        function loadsubjects()
        {

            var value=document.getElementById("selectdept").value;

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
                    // alert('alert');
                    document.getElementById('divsubject').innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET','loadsubjects.php?dept='+value,'true');
            xmlhttp.send();

        }

    </script>
    <link href="log.css" rel="stylesheet">
</head>
<body>
<div id="webpage" style="padding-top: 10px">

    <div id="message">
        <div id="messagediv">
            <form id="Messageform">
                <h2 style="margin-left: 210px">Add New Message</h2>
                <h1 style="margin-left: 210px">MESSAGE</h1>
            </form>
        </div>
    </div>
    <hr>


    <div id="video">
        <div id="videodiv">
            <h2 style="margin-left: 230px">Add New Video</h2>
        </div>
        <form id="videoform">


            <!--<h1 style="margin-left: 220px">VIDEO</h1>-->
            <h3 style="margin-left: 20px"> Select Department</h3>

            <select name="dept" onchange="loadsubjects();"id="selectdept">
                <option name="cse" value="">-select department-</option>

                <option name="cse" value="cse">Computer Science And Engg.</option>
                <option name="it" value="it">Information Technology</option>
                <option name="mech" value="mech">Mehanical Engg.</option>
                <option name="civil" value="mech">Civil Engg.</option>
                <option name="lectronics" value="electronics">Electronice Engg.</option>
                <option name="electrical" value="electrical">Electrical Engg.</option>
            </select>

            <h3 style="margin-left: 20px">Select Subject</h3>

            <!-- <input type="" value="CPP" style="margin-left: 37px">-->
            <div id="divsubject">
                <!--
                <select name="subject" style="margin-left:36px" id="subjects">
                    <option name="">-subject-</option>
                             -->

            <select name="subject" style="margin-left:36px" id="subjects">
                <option name="">-subject-</option>
                    <?php


                     $dept='csc';
                        if(mysql_connect('localhost','root',''))
                    {
                    if(mysql_select_db('wetube'))
                    {
                    $query='select subject from cse_sub';
                    //echo $query;
                    $result=mysql_query($query);
                   //echo('<select id="subject">
                        //<option name="">-select subject-</option>');


                        while($row=mysql_fetch_assoc($result))
                        {

                        echo ('
                        <option name="'.$row['subject'].'">'.$row['subject'].'</option>
                        ');

                        }
                        //echo ('
                    //</select>
                    //');
                    }
                    }
                 ?>


                </select>
            </div>
            <br>
            <br>

            <input type="file" name="Browse" style="margin-left: 20px">
            <br>
            <br>
            <input type="button"  style="width: 100px;margin-left: 20px" value="UPLOAD">

            <input type="button" value="CANCEL" style="margin-left: 50px;width: 100px">
        </form>



    </div>

    <div id="subject">
        <div id="subjectdiv">
            <form id="subjectform">
                <h2 style="margin-left: 210px">Add New Subject</h2>
                <h1 style="margin-left: 210px">SUBJECT</h1>
                <h3 style="margin-left: 20px"> Select Department </h3><!--<input type="option">-->
                <select name="dept">
                    <option name="cse">Computer Science And Engg.</option>
                    <option name="it">Information Technology</option>
                    <option name="mech">Mehanical Engg.</option>
                    <option name="civil">Civil Engg.</option>
                    <option name="lectronics">Electronice Engg.</option>
                    <option name="electrical">Electrical Engg.</option>
                </select>
                <br>
                <h3 style="margin-left: 20px">Enter Subject  </h3>  <!--<input type="option" style="margin-left: 37px" >-->
                <select name="subject" style="margin-left: 36px">
                    <option name="CPP">CPP</option>
                </select>
                <br>
                <br>
                <input type="button"  style="width: 100px;margin-left: 20px" value="OK">

                <input type="button" value="CANCEL" style="margin-left: 50px;width: 100px">
            </form>
        </div>
    </div>
    <hr>

    <div id="advertisement">
        <div id="advertisementdiv">
            <form id="advertisementform">
                <h2 style="margin-left: 210px">Add New Advertisement</h2>
                <h1 style="margin-left: 180px">ADVERTISEMENT</h1>
            </form>
        </div>
    </div>

    <div id="notice">
        <div id="noticediv">
            <form id="noticeform">
                <h2 style="margin-left: 210px">Add New Notice</h2>
                <h1 style="margin-left: 210px">NOTICE</h1>
                <h3 style="margin-left: 20px">Enter Notice<input type="text" style="margin-left: 50px"></h3>
                <br>
                <h3 style="margin-left: 20px">Enter Hyperlink<input type="text" style="margin-left: 20px"></h3>
                <br>
                <br>
                <br>
                <input type="button" value="OK" style="margin-left: 10px;width: 100px">
                <input type="button" value="CANCEL" style="margin-left: 50px;width: 100px">
            </form>
        </div>
    </div>
</div>
</body>
</html>
