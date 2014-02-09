<?php
namespace Communities\Activity_Reports\Model;

class Comment_Model extends Base_Model {
	
	
	
	public function __construct($comment_type) {
		
		parent::__construct();
		$this->type = $comment_type;
		$this->_fields('comments', 'comment_date_gmt', 'comment_type');
	}
	
	public static function factory($comment_type) {
		
		return new Comment_Model($comment_type);
	}
	
	
}