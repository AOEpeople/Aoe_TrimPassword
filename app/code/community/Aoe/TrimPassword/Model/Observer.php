<?php

/**
 * Observer
 *
 * @author Fabrizio Branca
 * @since 2013-01-03
 */
class Aoe_TrimPassword_Model_Observer {

	/**
	 * Trim password
	 *
	 * @param Varien_Event_Observer $observer
	 */
	public function trimPassword(Varien_Event_Observer $observer) {
		$controller = $observer->getControllerAction(); /* @var $controller Mage_Customer_AccountController */
		$request = $controller->getRequest(); /* @var $request Mage_Core_Controller_Request_Http */

		$login = $request->getPost('login');
		$login['username'] = trim($login['username']);
		$login['password'] = trim($login['password']);

		// faking the POST vars
		$_POST['login'] = $login;
	}

}