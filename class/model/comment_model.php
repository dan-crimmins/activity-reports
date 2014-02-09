<?php

class Comment_Model extends Base_Model {
	
	
	
	public function __construct($comment_type) {
		
		parent::__construct();
		$this->type = $comment_type;
		$this->_sql('comments', 'comment_date_gmt', 'comment_type');
	}
	
	
}