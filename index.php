
<?php
echo '<!doctype html><head> <meta charset="UTF-8"> <title>CFITChat Content</title><link rel="icon" type="image/png" href="Asia.ico"><meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=0.7, user-scalable=0"><style type="text/css">.style1 {				font-family: 华文中宋;				font-size: x-large;				font-weight: bold;				color: #0000FF;}.style3 {				text-decoration: none;}.style5 {text-decoration: none;				border-color: #FFFFFF;				font-family: 华文中宋;				font-weight: bold;				color: #0066FF;}.style9 {				font-family: 华文中宋;			font-weight: bold;				color: #0066FF;				text-decoration: none;}.style10 {text-decoration: none;				border-width: 0;}.style12 {				font-family: 华文中宋;				font-weight: bold;}.style13 {				color: #0066FF;}.style14 {				font-family: 华文中宋;}.style15 {font-size: large;					border-color: #FFFFFF;text-decoration: none;				font-family: 华文中宋;				font-weight: bold;				color: #000000;}.off {font-size: large;					color: #7409F7;text-decoration: none;				font-family: 华文中宋;				font-weight: bold;				color: #000000;}.style16 {text-decoration: none;font-size: x-large;				border-color: #FFFFFF;				font-family: 华文中宋;				font-weight: bold;				color: #7409F7;}.style17 {			font-family: 华文中宋;				font-weight: bold;				font-size: medium;				color: #0033CC;}body {background:url(../../CFITdatabase/CFITRes/bg.php);background-position:center center;    background-repeat:no-repeat;background-size:cover;background-attachment: fixed;}</style><audio src="" autoplay="autoplay" loop="loop"></audio><meta http-equiv="Page-Enter" content="revealTrans(Duration=1.0,Transition=21)"></head><div style="height: 100%;background:rgba(255, 255, 255, 0.4);padding: 5px 0px 15px 0px;"><p class="style1">&nbsp;<a href="#" class="style3"><img src="Asia.ico" width="36" height="36"> <span class="style13">CFITChat Content</span></a><span class="style17"><label onclick=create()><label id="ou" style="position:absolute; right:70px; top:50px;">Create Chat</label></label></span></p><hr><div style="height: 100%;background:rgba(255, 255, 255, 0.6);padding: 0px 15px 35px 0px;"><!--p class="style2" style="height: 1px; width: 8px;"--><form method="post" style="border: medium hidden #FFFFFF; height: 100%; width: 100%;"><script src="jquery.js"></script>';
$dir = "./";//Ŀ¼


if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        $i = 0;
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                $files[$i]["name"] = $file;
                $files[$i]["size"] = round((filesize($file)/1024),2);
                $files[$i]["time"] = date("Y-m-d H:i:s",filemtime($file)+28800);
                $i++;
            }
        }
    }

    closedir($dh);
    foreach($files as $k=>$v){
        $size[$k] = $v['size'];
        $time[$k] = $v['time'];
        $name[$k] = $v['name'];
    }
    array_multisort($time,SORT_DESC,SORT_STRING, $files);
  array_multisort($name,SORT_DESC,SORT_STRING, $files);
    array_multisort($size,SORT_DESC,SORT_NUMERIC, $files);
echo '<fieldset name="Group1" style="border-style: none; border-style: none; width: 100%; height: 60px;"><a href="cfitchat" class="style3"><img src="in.png" width="36" height="36" class="style10"><span class="style16">CFITChat</span><span class="off" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Official ChatRoom</span></a></fieldset>';
echo "<hr>";
for($j=0;$j<$i;$j++)    {
$fileEx=strtolower(substr(strrchr($files[$j]["name"],"."),1));

if($files[$j]["name"]=='cfitchat' and is_dir($files[$j]["name"])){

}
else
if($files[$j]["name"]!='cfitchat' and is_dir($files[$j]["name"])){
echo '<fieldset name="Group1" style="border-style: none; border-style: none; width: 95%; height: 35px;"><a href="'.$files[$j]["name"].'" class="style3"><img src="in.png" width="18" height="18" class="style10"><span class="style5">&nbsp;'.$files[$j]["name"].'</span><span class="style15" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$files[$j]["time"].'</span></a><label onclick=onadd("'.$files[$j]["name"].'") class="style3"><span class="style15" style="float:right">Delete</span></label></fieldset>';
}
}
}
echo '<script type="text/javascript">  function onadd(hre)  {if(confirm("Delete This Chatroom?")){$.ajax({  method: "POST",  url:"delete.php?del="+hre,})  .done(function(msg) {  alert(msg);location.href="./";  });}    } function create(){if(confirm("Create a New Chatroom?")){k=prompt("Enter The ChatRoom Name:");if (k.match(/^[ ]*$/)){alert("Enter a AVAILABLE Name!");}else{if(k=="null"){$.ajax({  method: "POST",  url:"createchat.php?type=random",})  .done(function(msg) {  if(msg=="[Warning] You Cannot Create a New Chatroom Within 30 Minutes After The Last Chatroom Is Created."){alert(msg);}else{location.href=msg;  }});}else{$.ajax({  method: "POST",  url:"createchat.php?name="+k,})  .done(function(msg) {  if(msg=="[Warning] You Cannot Create a New Chatroom Within 30 Minutes After The Last Chatroom Is Created."){alert(msg);}else{location.href=msg;  }});}}   }} </script>';
