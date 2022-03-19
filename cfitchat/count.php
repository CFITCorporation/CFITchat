<?php
$tim = date("Y/m/d H:i:s",time()+28800);
$u=$_SERVER['REMOTE_ADDR'];
$myfile = fopen("record.html", "a+b") or die("Unable to open file!");
fwrite($myfile, '<li style="color:lime">&nbsp;'.$tim." : IP - ".$u." Have Just Entered The Website.</li>");//用户离线
fclose($myfile);
?>