<?php
if(!file_exists('once.dat'))
{
$myfile = fopen("once.dat", "w") or die("Unable to open file!");
fwrite($myfile, '0');//�û�����
fclose($myfile);
exit('true');
}
else
if(file_get_contents('once.dat')=='0')
{
$myfile = fopen("once.dat", "w") or die("Unable to open file!");
fwrite($myfile, '1');//�û�����
fclose($myfile);
exit('false');
}
else
if(file_get_contents('once.dat')=='1')
{
$myfile = fopen("once.dat", "w") or die("Unable to open file!");
fwrite($myfile, '0');//�û�����
fclose($myfile);
exit('true');
}
