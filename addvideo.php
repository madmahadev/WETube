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
   <link href="addvideo.css" rel="stylesheet">
    <script type="text/javascript">
        function loadsubjects()
        {

            var value=document.getElementById("selectdept").value;
            //alert(value);
            //alert(value);
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
</head>
<body>
<div id="main">
    <form action="video.php" method="post" enctype="multipart/form-data" style="margin-left: 50px">


            <table>
            <tr>
                <td>
       <h3> Select Department:</h3>
                </td>
                <td>
        <select name="dept" id="selectdept" onchange="loadsubjects()">
            <option name=" ">Select Department</option>
            <option name="cse" value="cse">Computer Science And Enginnering</option>
            <option name="it" value="it">Information Technology</option>
            <option name="mech" value="mech">Mechanical Engineering</option>
            <option name="civil"value="civil">Civil Engineering</option>
            <option name="electrical" value="electrical">Electrical Engineering</option>
            <option name="electronics" value="electronics">Electronics Engineering</option>
        </select>
            </td>
            </tr>


        <tr>
            <td>
        <h3>Select Subject</h3>
                </td>
            <td>

        <div id="divsubject">
            <select name="dept" id="selectdept">
                <option>-Select Subject-</option>
            </select>
        </div>


            </td>

                <tr>
                <td>
                    <h3>Choose file:</h3>
                    </td>
            <td>
        <input type="file" name="file">
                </td>
            </tr>
        <tr>
            <td>
            <h3>Add Description:</h3>
                </td>
            <td>
        <textarea placeholder="Description Of Video 500 hundred Char only" required="required" rows="5" cols="30" name="description" style="margin-top: 20px"></textarea>
                </td>
            </tr>
                <tr>
                <td>

        <input type="submit" value="upload">
                </td>
                    <td>
        <input type="button" value="cancel"onclick="cancle()">
                    </td>
                </tr>
                </table>

    </form>

</div>
</body>
</html>