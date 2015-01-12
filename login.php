
<?php
if(isset($_GET['error']))
{
    if(!empty($_GET['error']))
    {
        echo $_GET['error'];
    }
}

echo ('
        <script type="text/jvascript">
        location.reload(true)
        </script>
        ');
if(!isset($_SESSION['id']))
    {
        //echo 'in admin';
 if(isset($_POST['username'])&&isset($_POST['password']))
    {
        $uname=$_POST['username'];
        $pass=$_POST['password'];


        if(!empty($uname)&&!empty($pass))
        {
         if(mysql_connect('localhost','root',''))
         {
             if(mysql_select_db('wetube'))
             {
                 $pass=md5($pass);

                 $query='select * from admin where username=\''.$uname. '\'AND password=\''.$pass.'\'';
                 echo $query;
                 $result=mysql_query($query);
                 $count=@mysql_num_rows($result);
                  if($count==1)
                  {  session_start();
                      $query_row=mysql_fetch_assoc($result);
                      $_SESSION['id']=$query_row['username'];
                      header('location:adminlogin.php');
                      die();
                      //session_end();
                  }
                 else
                     echo('incorrect Username or password');
                 unset($_POST['username']);
                 unset($_POST['password']);

             }
         }


        }
        else
        {
            echo 'Please Enter USERNAME AND PASSWORD';
        }

    }

}
?>

<html>
<head>
    <title>
        admin-login
    </title>
    <link href="login.css" rel="stylesheet">
</head>
<body>
<div id="frmdiv">
    <center>

    <form action="login.php" method="post" id="loginform">
        <div id="uname">
        UserName:<input type="text" name="username" width="10" placeholder="username" ><br>
        </div>
        <div id="password">
        Password:<input type="password" name="password" width="10" placeholder="password"> <br>
        </div>
        <div id="submit">
        <input type="submit" width="auto" id="submit" name="submit" value="submit">
        </div>
    </form>
    </center>
</div>



</body>
</html>

