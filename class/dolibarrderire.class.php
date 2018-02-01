<?php

class TContactPicturesAnalyse extends SeedObject {

	function __construct(&$db) {
		
		$this->db = $db;

		$this->table_element = 'contactPicturesAnalyse';

		$this->fields=array(
			'rowid'=>array('type'=>'integer','index'=>true),
			'fk_contact'=>array('type'=>'integer','index'=>true),
			'gender'=>array('type'=>'string'),
			'age'=>array('type'=>'integer'),
			'ethnicity'=>array('type'=>'string'),
			'smiling'=>array('type'=>'float'),
			'beauty_male'=>array('type'=>'float'),
			'beauty_female'=>array('type'=>'float'),
			'skinstatus'=>array('type'=>'string'),
			'glass'=>array('type'=>'string')
		);		
		$this->init();
	}

	function fetchByContact($fk_contact) {

		$res = $this->db->query("SELECT rowid FROM ".MAIN_DB_PREFIX.$this->table_element." 
			WHERE fk_contact=".(int)$fk_contact);
		if($obj = $this->db->fetch_object($res)) {
			return $this->fetchCommon($obj->rowid);
		}

		return false;
	}

}

