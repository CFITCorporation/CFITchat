<?php
error_reporting(0);
//session_start();
require("../session.php");
$str='<li style="color:lime"> Users Online: ';
$list=glob("./user/*.dat");
for($j=0;$j<=count($list);$j++)
{
if(file_exists($list[$j]) and file_exists(substr($list[$j],0,-4).".txt")){
if(file_get_contents($list[$j])=='1')
{
$str=$str.file_get_contents(substr($list[$j],0,-4).".txt").",";
}
}

/*if(!file_exists("./user/".$u.".dat"))
{
$myfile = fopen("./user/".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, '1');
fclose($myfile);
}

if(!file_exists("./user/".$u.".txt"))
{
$myfile = fopen("./user/".$u.".txt", "w") or die("Unable to open file!");
fwrite($myfile, $u);
fclose($myfile);
}*/
}
if(time()-filectime("./user")>43200)
{for($j=0;$j<=count($list);$j++)
{
unlink($list[$j]);
unlink(substr($list[$j],0,-4).".txt");
unlink('./user');
mkdir('./user');
}
}
$str=substr($str,0,-1)."</li>";
echo $str;
?>