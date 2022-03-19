<?php
require("../session.php");
if(!file_exists('user'))
{
mkdir('user');
}
if(!isset($_GET['name']))
{
exit("./user/".$u.".txt");
}
if(isset($_GET['name']) and $_GET['name']!='null' and $_GET['name']!='')
{
$myfile = fopen("./user/".$u.".txt", "w") or die("Unable to open file!");
fwrite($myfile, trim(strip_tags($_GET['name'])));
fclose($myfile);
$myfile = fopen("./user/".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, '1');
fclose($myfile);
exit($_SERVER['REMOTE_ADDR']."  -  ".$_GET['name']);
}
else
{
$myfile = fopen("./user/".$u.".txt", "w") or die("Unable to open file!");
fwrite($myfile, $u);
fclose($myfile);
$myfile = fopen("./user/".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, '1');
fclose($myfile);
}
?>