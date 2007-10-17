<?php
/**
 * Inspekt Supercage
 *
 * @author Ed Finkler <coj@funkatron.com>
 *
 * @package Inspekt
 */

/**
 * require main Inspekt class
 */
require_once 'Inspekt.php';

/**
 * require the Cage class
 */
require_once 'Inspekt/Cage.php';

/**
 * The Supercage object wraps ALL of the superglobals
 *
 */
Class Inspekt_Supercage {

	/**
	 * The get cage
	 *
	 * @var Inspekt_Cage
	 */
	var $get;

	/**
	 * The post cage
	 *
	 * @var Inspekt_Cage
	 */
	var $post;

	/**
	 * The cookie cage
	 *
	 * @var Inspekt_Cage
	 */
	var $cookie;

	/**
	 * The env cage
	 *
	 * @var Inspekt_Cage
	 */
	var $env;

	/**
	 * The files cage
	 *
	 * @var Inspekt_Cage
	 */
	var $files;

	/**
	 * The session cage
	 *
	 * @var Inspekt_Cage
	 */
	var $session;

	var $server;

	/**
	 * Enter description here...
	 *
	 * @return Inspekt_Supercage
	 */
	function Inspekt_Supercage() {
		// placeholder
	}

	/**
	 * Enter description here...
	 *
	 * @param boolean $strict
	 * @return Inspekt_Supercage
	 */
	function Factory($strict = TRUE) {

		$sc	= new Inspekt_Supercage();
		$sc->_makeCages($strict);

		// eliminate the $_REQUEST superglobal
		if ($strict) {
			$_REQUEST = null;
		}

		return $sc;

	}

	/**
	 * Enter description here...
	 *
	 * @see Inspekt_Supercage::Factory()
	 * @param boolean $strict
	 */
	function _makeCages($strict=TRUE) {
		$this->get	= Inspekt::makeGetCage($strict);
		$this->post	= Inspekt::makePostCage($strict);
		$this->cookie	= Inspekt::makeCookieCage($strict);
		$this->env	= Inspekt::makeEnvCage($strict);
		$this->files	= Inspekt::makeFilesCage($strict);
		$this->session= Inspekt::makeSessionCage($strict);
		$this->server	= Inspekt::makeServerCage($strict);
	}

}