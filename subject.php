<?php
@session_start();
if(isset($_SESSION['id'])&&!empty($_SESSION['id']))  //if user is not logged in and requestiong to access database
{
    $username=$_SESSION['id'];
    echo $username."....<br>";
        if(isset($_POST['subject'])&&!empty($_POST['subject'])) {
            $subject = $_POST['subject'];
        }
    else {
        echo " Please Enter Subject..";
        die();
    }
$subject=str_replace(' ','_',$subject);

        $dept1=$_POST['dept'];
        $dept='';
        if($dept1=='Select Department')
        {
            echo 'Select Department...';
            die();
        }
        switch($dept1)
        {
            case 'Computer Science And Enginnering':
                $dept='cse'; break;
            case 'Information Technology': $dept='it'; break;
            case 'Mechanical Engineering': $dept='mech'; break;
            case 'Civil Engineering': $dept='civil'; break;
            case 'Electrical Engineering': $dept='electrical';  break;
            case 'Electronics Engineering': $dept='electronics'; break;

        }


        //echo $dept;


        if (!empty($subject)) {
            require_once('connect.php');
            $querycheck='select id from '.$dept.'_sub where subject=\''.$subject.'\'';
            $exist=mysql_query($querycheck);

            if(mysql_num_rows($exist)>=1)
            {
                echo'subject already exists...';
                mysql_close($connect);
                die();
            }
            echo 'Checking For Existence.....Not Available<br>';

            $queryinsert = 'insert into '.$dept.'_sub values(\'\',\''.$subject.'\')';
            mysql_query($queryinsert);

            $querycreate='create table '.$dept.'_'.$subject.'(id int AUTO_INCREMENT PRIMARY KEY,video_name VARCHAR(300),description VARCHAR(500))';
              //echo $querycreate;
            if(@mysql_query($querycreate))
            {

            echo "Creating Saperate Entry in database... success<br>";
            }
            mysql_close($connect);
            $dir="videos\\$dept\\$subject";
            if(mkdir($dir))
            {
                echo 'Creating Directory....Success!!!<br>';
            }
            echo' Subject Added successfully...!<br>';
            //header('location:addsubject.php?success=subject added to database..');


    }
}
else
{
   header('location:login.php?error=need to login first');
}

?>