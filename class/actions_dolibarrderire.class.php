<?php
/* <one line to give the program's name and a brief idea of what it does.>
 * Copyright (C) 2015 ATM Consulting <support@atm-consulting.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * \file    class/actions_dolibarrderire.class.php
 * \ingroup dolibarrderire
 * \brief   This file is an example hook overload class file
 *          Put some comments here
 */
/**
 * Class ActionsdolibarrDeRire
 */
class ActionsdolibarrDeRire
{
	/**
	 * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
	 */
	public $results = array();

	/**
	 * @var string String displayed by executeHook() immediately after return
	 */
	public $resprints;

	/**
	 * @var array Errors
	 */
	public $errors = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
	}

	/**
	 * Overloading the doActions function : replacing the parent's function with the one below
	 *
	 * @param   array()         $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    &$object        The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          &$action        Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	function formObjectOptions($parameters, &$object, &$action, $hookmanager)
	{
		$error = 0; // Error counter
		$myvalue = 'test'; // A result value

        $contexts = explode(':', $parameters['context']);
		if (in_array('contactcard', $contexts))
		{
            // This doesn't work at all. 
            // "Fatal error: Class 'SeedObject' not found in /users/lpro/casir/pellouju/public_html/dolibarr/htdocs/custom/dolibarrderire/class/dolibarrderire.class.php on line 3"
            //dol_include_once('/dolibarrderire/class/dolibarrderire.class.php');
            //$array = new TContactPicturesAnalyse($db);
            //$array->fetchByContact($object->id);
            
            $array = [  // Hack to display some informations because we don't manage to use database (seedObject not found)
                "gender" => "Yes",
                "age" => 34,
                "smiling" => 34.4,
                "beauty_male" => 43.2,
                "beauty_female" => 25.5,
                "skinstatus" => "White",
                "glass" => "White",
                "ethnicity" => "White"
            ];
            
            print "</table></div></div></div>";          
            print '<div class="fichecenter">';
            print '<div class="fichehalfleft">';
            print '<div class="underbanner clearboth"></div>';
            print '<table class="border tableforfield" width="100%">';
            
            foreach ($array as $key => $value){
                print '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
            }
            print '</table></div>';
            print '<div class="fichehalfright">';
            print '<div class="ficheaddleft">';
            print '<div class="underbanner clearboth"></div>';
            print '<table class="border tableforfield" width="100%">';
           
		}

		if (! $error)
		{
			return 0; // or return 1 to replace standard code
		}
		else
		{
			$this->errors[] = 'Error message';
			return -1;
		}
	}
    
    static function setFields(&$object) {
        
        $values = 
        $cpa = new TContactPicturesAnalyse($db);
        $cpa->setValue($values);
        if($cpa->id>0) $cpa->update($values);
        else $cpa->create($values);
           
        setEventMessage("Analyse de l'image sauvegardé");		 
        }
}
