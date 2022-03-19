<?php
$myfile = fopen("time.dat", "r") or die("Unable to open file!");
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
if(time()-fread($myfile,filesize("time.dat"))<1800){

header("Content-Type:text/html;charset=gb2312");
exit("[Warning] You Cannot Create a New Chatroom Within 30 Minutes After The Last Chatroom Is Created.");
}
else{
$myfile = fopen("time.dat", "w") or die("Unable to open file!");
fwrite($myfile, time());
fclose($myfile);
function getRandChar($length=8)
{
	$str = "";
	$strPol = "ijk34OPQRSTUHIJKLMADEFGefghN267cdVWXBCYZ015lmnopqrstu89abvwxyz";
	$max = strlen($strPol)-1;

	for($i=0;$i<$length;$i++){
	$str.=$strPol[rand(0,$max)];
	}
	return $str;
}
if(!isset($_GET['type']) or $_GET['type']=='random')
{
$url=getRandChar();
}
if(isset($_GET['name']) and !isset($_GET['type']))
{
if(ctype_space($_GET['name'])||$_GET['name']==''||$_GET['name']=='null'||strtoupper($_GET['name'])=='CFITCHAT')
{
$url=getRandChar();
}
else{
$url=trim(strip_tags($_GET['name']));
}
}
mkdir($url);
copy("./cfitchat/chat.php",$url."/chat.php");
copy("./cfitchat/index.html",$url."/index.html");
copy("./cfitchat/jquery.js",$url."/jquery.js");
copy("./cfitchat/time.dat",$url."/time.dat");
copy("./cfitchat/timer.dat",$url."/timer.dat");
copy("./cfitchat/user.php",$url."/user.php");
copy("./cfitchat/useronline.php",$url."/useronline.php");
copy("./cfitchat/once.php",$url."/once.php");
copy("./cfitchat/count.php",$url."/count.php");
if(!file_exists($url."/history.txt")){
$myfile = fopen($url."/history.txt", "w") or die("Unable to open file!");
fwrite($myfile, '<li style="color:lime">A New ChatRoom '.$url." Has Been Created.<br /></li>");
}exit($url);
}
?>