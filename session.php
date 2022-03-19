<?php
session_start();
$u=substr(md5(session_id()),-8);
?>