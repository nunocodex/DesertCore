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
	
	switch($_GET['type']) {
		case 'change':
			// email change verification
			if(!check($_GET['user'], $_GET['key'])) redirect();
			
			$AccountEmail = new AccountEmail();
			$AccountEmail->setUsername($_GET['user']);
			$AccountEmail->setVerificationKey($_GET['key']);
			$AccountEmail->verifyEmail();

			message('success', lang('success_20',true));
			break;
		default:
			// registration email verification
			if(isLoggedIn()) redirect();
			if(!check($_GET['user'], $_GET['key'])) redirect();
			
			$Registration = new AccountRegister();
			$Registration->setUsername($_GET['user']);
			$Registration->setVerificationKey($_GET['key']);
			$Registration->verifyEmail();
			
			message('success', lang('success_1',true));
	}
	
} catch(Exception $ex) {
	message('error', $ex->getMessage());
}