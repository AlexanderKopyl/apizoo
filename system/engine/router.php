<?php
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

namespace System\Engine;

use System\Engine\Action as CoreAction;

/**
* Router class
*/
final class Router {
	private $registry;
	private $pre_action = array();
	private $error;
	
	/**
	 * Constructor
	 *
	 * @param	object	$route
 	*/
	public function __construct($registry) {
		$this->registry = $registry;
	}
	
	/**
	 * 
	 *
	 * @param	object	$pre_action
 	*/	
	public function addPreAction(CoreAction $pre_action) {
		$this->pre_action[] = $pre_action;
	}

	/**
	 * 
	 *
	 * @param	object	$action
	 * @param	object	$error
 	*/		
	public function dispatch(CoreAction $action, CoreAction $error) {
		$this->error = $error;

		foreach ($this->pre_action as $pre_action) {
			$result = $this->execute($pre_action);

			if ($result instanceof Action) {
				$action = $result;

				break;
			}
		}

		while ($action instanceof Action) {
			$action = $this->execute($action);
		}
	}
	
	/**
	 * 
	 *
	 * @param	object	$action
	 * @return	object
 	*/
	private function execute(CoreAction $action) {
		$result = $action->execute($this->registry);

		if ($result instanceof Action) {
			return $result;
		} 
		
		if ($result instanceof \Exception) {
			$action = $this->error;
			
			$this->error = null;
			
			return $action;
		}
	}
}
