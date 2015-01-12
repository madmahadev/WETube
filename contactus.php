<?php
if(isset($_POST['email'])&&isset($_POST['name'])&&isset($_POST['message']))
{

$name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
if(mysql_connect('localhost','root',''))
{

   if(@mysql_select_db('wetube'))
   {
       $query="INSERT INTO `contactus`(`id`, `name`, `email`, `message`, `date`, `seen`) VALUES ('','$name','$email','$message',NOW(),'no')";


       if(mysql_query($query)) {
           echo("Thank you for your valuable feedback");
       }
       else
       {
           echo'Faild to contact server...Sorry..';
       }
   }

}
}


?>
<html>
<head>

    <script type="text/javascript">
        function validateForm() {


            var x = document.forms["myForm"]["email"].value;
            var name=document.forms["myForm"]["name"].value;
            var msg=document.forms["myForm"]["message"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");

            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length||name.length<1||msg.length<1) {
                alert("Not a valid  data");
                return false;
            }
        }
    </script>
<title>
contact_us

</title>
    <link href="contactus.css" rel="stylesheet">
</head>
<body style="background-color: darkgoldenrod">


<div id="form">

   <p>FEEDBACK FORM:</p>
<form id="contact_form" name="myForm" onsubmit="return validateForm();"  action="contactus.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <label for="name">Your name:</label><br />
        <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
    </div>
    <div class="row">
        <label for="email">Your email:</label><br />
        <input id="email" name="email" class="input" type="text" value="" size="30" /><br />
    </div>
    <div class="row">
        <label for="message">Your message: *500 char Only</label><br />
        <textarea id="message" class="input" name="message" rows="8" cols="40"></textarea> <br />
    </div>
    <center> <input id="submit_button" style="width: auto;border: 1px solid #191b80;margin-bottom: 10px" type="submit" value="Send Message" /></center>
</form>
</div>
</body>
</html>

