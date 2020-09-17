<?php
/**
 * DesertCore CMS
 * https://desertcore.com/
 * 
 * @version 1.2.0
 * @author Lautaro Angelico <https://lautaroangelico.com/>
 * @copyright (c) 2018-2020 Lautaro Angelico, All Rights Reserved
 * 
 * Licensed under the MIT license
 * http://opensource.org/licenses/MIT
 * 
 * Donate to the Project:
 * https://desertcore.com/donate
 * 
 * Contribute:
 * https://github.com/lautaroangelico/DesertCore
 */

try {
	
	if(!check($_GET['id'])) redirect('modulemanager/list');
	
	$ModuleManager = new ModuleManager();
	$ModuleManager->setId($_GET['id']);
	$ModuleManager->deleteModule();
	
	redirect('modulemanager/list');
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}