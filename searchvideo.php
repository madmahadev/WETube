<?php
$found=false;
$text=$searchquery;
mysql_connect('localhost','root','');
mysql_select_db('wetube');
$query='select * from '.$dept_name.'_sub';
$result=mysql_query($query);
$subfound=false;
$subname='';
while($row=mysql_fetch_assoc($result))
{
    $subname=strtolower($row['subject']);
    if (strpos($text,$subname) !== false) {
        $subfound=true;
        break;
    }

}
if($subfound==true)
{
    $text=str_replace($subname,'',$text);
    $query='select *  from '.$dept_name.'_'.$subname;
    $result=mysql_query($query);
    while($row=mysql_fetch_assoc($result))
    {


        $dataname=strtolower($row['video_name']);
        $datades=strtolower($row['description']);
        //echo $dataname.'<br>'.$datades;
        if(@(strpos($text,$dataname) !== false)||@(strpos($dataname,$text) !== false)||@(strpos($datades,$text) !== false))
        {
            $found=true;
            $link = 'videos/'.$dept_name.'/' . $subname . '/' . $dataname . '&link_name=' . $subname;
            echo('
                    <div class="searchedvideo">

                <a href="'.$dept_name.'.php?video_name=' . $link . '">' . $dataname .' '.$datades. '</a><br>
                </div>
               ');
        }
    }

}
else
{

$query='select subject from '.$dept_name.'_sub';

$result=mysql_query($query);
    while($subrow=mysql_fetch_assoc($result))
    {
        $subname=$subrow['subject'];
        $query='select *  from '.$dept_name.'_'.$subname;

        $resvideo=mysql_query($query);
        @$count=mysql_num_rows($resvideo);
        //echo $count;
        while($count>=1&&@$row=mysql_fetch_assoc($resvideo))
        {


            $dataname=strtolower($row['video_name']);
            $datades=strtolower($row['description']);
            //echo $dataname.'<br>'.$datades;
            if((strpos($text,$dataname) !== false)||(strpos($dataname,$text) !== false)||(strpos($datades,$text) !== false))
            {
                $found=true;
                $link = 'videos/'.$dept_name.'/' . $subname . '/' . $dataname . '&link_name=' . $subname;
                echo('
                    <div class="searchedvideo">

                <a href="'.$dept_name.'.php?video_name=' . $link . '">' . $dataname .' '.$datades. '</a><br>
                </div>
               ');
            }
        }



    }

}
if($found==false)
    echo 'Sorry..No Result Found...!';

?>