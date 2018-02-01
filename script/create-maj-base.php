<?php
/*
 * Script créant et vérifiant que les champs requis s'ajoutent bien
 */

if(!defined('INC_FROM_DOLIBARR')) {
	define('INC_FROM_CRON_SCRIPT', true);

	require('../config.php');

}




global $db;

dol_include_once('/dolibarrderire/class/dolibarrderire.class.php');

//$PDOdb=new TPDOdb;

$o=new TContactPicturesAnalyse($db);
//$o->init_db_by_vars($PDOdb);
$o->init_db_by_vars($db);
