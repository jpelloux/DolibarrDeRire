<?php
	define("INC_FROM_CRON_SCRIPT",1);
	require 'config.php';
/*
	$res = $db->query("SELECT * FROM ".MAIN_DB_PREFIX."user");
var_dump($db);
	while($obj = $db->fetch_object($res)) {
		var_dump($obj);
	}
*/
$u=new User($db);
$u->fetch(1);
$u->setPassword($u,'123456');
