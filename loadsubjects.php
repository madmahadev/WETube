<?php
if(isset($_GET['dept']))
{
    $dept=$_GET['dept'];
  // $dept=$dept.'_subject';
    if(!empty($dept))
    {
        if(mysql_connect('localhost','root',''))
        {
            if(mysql_select_db('wetube'))
            {
                $query='select subject from '.$dept.'_sub';
                //echo $query;
                $result=mysql_query($query);
                //echo"select subject:";
               echo('<select id="subject" name="subject" id="subjects" style="margin-left: 36px">
               <option name="">-select subject-</option>

               ');
                while($row=mysql_fetch_assoc($result))
                {

                    echo ('
                    <option name="'.$row['subject'].'">'.$row['subject'].'</option>
                    ');

                }
                echo ('
                </select>
                ');
            }
        }
    }
}
?>
