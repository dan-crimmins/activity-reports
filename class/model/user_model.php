<?php
namespace Communities\Activity_Reports\Model;

class User_Model extends Base_Model {
	
	
	public function __construct() {
		
		parent::__construct();
		$this->_sql('users', 'user_registered');
	}
	
	
}