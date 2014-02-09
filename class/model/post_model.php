<?php
namespace Communities\Activity_Reports\Model;

class Post_Model extends Base_Model {
	
	
	public function __construct($post_type) {
		
		parent::__construct();
		$this->_type($post_type);
		$this->_fields('posts', 'post_date_gmt', 'post_type');
	}
	
	public static function factory($post_type) {
		
		return new Post_Model($post_type);
	}
	
	
	
}