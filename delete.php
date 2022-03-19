<?php
//echo filectime("cfitchat")+3600*8;//创建时间
function deldir($dir) {

  //先删除目录下的文件：
  $dh=opendir($dir);
  while ($file=readdir($dh)) {
    if($file!="." && $file!="..") {
      $fullpath=$dir."/".$file;
      if(!is_dir($fullpath)) {
          unlink($fullpath);
      } else {
          deldir($fullpath);
      }
    }
  }
 
  closedir($dh);
  //删除当前文件夹：
  if(rmdir($dir)) {
    return true;
  } else {
    return false;
  }
}
if(!file_exists($_GET['del']))
{exit("Deletion Failed!\nNo Such ChatRoom In The ChatList.");}
if(time()-(filectime($_GET['del']))>86400){
if(strtoupper($_GET['del'])!="CFITCHAT"){
deldir($_GET['del']);
exit("Deletion Success!");
}
else
{
exit("Deletion Failed!\nYou Can Not Delete The Offical Room CFITChat.");
}

}
exit("Deletion Failed!\nYou Can Delete This Chatroom After ".date("Y-m-d H:i:s",filectime($_GET['del'])+86400+28800)." .");
?>