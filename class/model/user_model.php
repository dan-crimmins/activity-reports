<?php
namespace Communities\Activity_Reports\Model;

class User_Model extends Base_Model {
	
	
	public function __construct() {
		
		parent::__construct();
		$this->_fields('users', 'user_registered');
	}
	
	public static function factory() {
		
		return new User_Model;
	}
	
	
}