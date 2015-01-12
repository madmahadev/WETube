<?php

if(isset($_GET['query']))
{
    $text=$_GET['query'];
    if(!empty($text)&&strlen($text)>3)
    {

    if(@mysql_connect('localhost','root',''))
    {
        if(@mysql_select_db('wetube'))
        {
            $query="select subject from cse_sub where subject like '%$text%' ";

            $query_run=mysql_query($query);


            while(@$query_row=mysql_fetch_assoc($query_run))
            {
                $result=$query_row['subject'];

                echo $query_row['subject']."<br>";
            }

        }
    }
    }
}
?>