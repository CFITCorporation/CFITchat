<?php
//session_start();
require("../session.php");
//substr(md5(session_id()),-10);
if(!file_exists("./time")){
mkdir("./time");
}
if(isset($_GET['us']))
{
if($_GET['us']=='1'){
header("Content-Type:text/html;charset=GB2312");
if(!file_exists("./time/timer".$u.".dat")){
$myfile = fopen("./time/timer".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, "0");
fclose($myfile);
}

$myfile = fopen("./user/".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, '1');
fclose($myfile);

}
else
{
header("Content-Type:text/html;charset=UTF-8");
$myfile = fopen("./user/".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, '0');
fclose($myfile);
//exit($u);
}
}
ob_start();
function clean_xss(&$string, $low = False)
{
 if (! is_array ( $string ))
 {
 $string = trim ( $string );
 $string = strip_tags ( $string );
 $string = htmlspecialchars ( $string );
 if ($low)
 {
  return True;
 }
 //$string = str_replace ( array ('"', "\\", "'", "/", "..", "../", "./", "//" ), '', $string );
 $no = '/%0[0-8bcef]/';
 $string = preg_replace ( $no, '', $string );
 $no = '/%1[0-9a-f]/';
 $string = preg_replace ( $no, '', $string );
 $no = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';
 $string = preg_replace ( $no, '', $string );
 return True;
 }
 $keys = array_keys ( $string );
 foreach ( $keys as $key )
 {
 clean_xss ( $string [$key] );
 }
}
$myfile = fopen("time.dat", "w") or die("Unable to open file!");
fwrite($myfile, time());
fclose($myfile);
if(isset($_POST['att'])){
$str=$_POST['att'];
clean_xss($str);
$str=nl2br($str);
if($str!=""){
$str='<li style="color:lime">'.file_get_contents("./user/".$u.".txt")."<span class='style1'> ".date("Y/m/d H:i:s",(int)file_get_contents('time.dat')+28800).'</span>'.'<br/>'.$str."</li>";
$myfile = fopen("history.txt", "a+b") or die("Unable to open file!");
fwrite($myfile, $str);
fclose($myfile);
}
}
ob_clean();
if(isset($_GET['chat']))
{
if($_GET['chat']=='1'){
if(!file_exists("timer".$u.".dat"))
{
$myfile = fopen("timer".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, '0');
fclose($myfile);
}
if(time()-(int)file_get_contents("timer".$u.".dat")>120){

ob_start();
ob_clean();
$myfile = fopen("timer".$u.".dat", "w") or die("Unable to open file!");
fwrite($myfile, time());
fclose($myfile);
exit("Share Success!");
}
exit("Share Failed!You Cannot Share That Chatroom Before ".date("Y-m-d H:i:s",(int)file_get_contents("timer".$u.".dat")+28800+120)." .");
}
}
?>