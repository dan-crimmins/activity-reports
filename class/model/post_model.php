<?php

class Post_Model extends Base_Model {
	
	
	public function __construct($post_type) {
		
		parent::__construct();
		$this->_type($post_type);
	}
	
	public static function factory($post_type) {
		
		return new Post_Model($post_type);
	}
	
	public function get() {
		
		$this->_setPostType();
		$this->_query = new WP_Query($this->_args);
		$this->count = $this->_query->found_posts;
		
		return $this;
	}
	
	
	public function before($date_text) {
		
		return $this;
		
	}
	
	public function after($date_text) {
		
		$this->_args['date_query'] = array(array('column' 		=> 'post_date_gmt',
												 'after'		=> $date_text));
		
		return $this;
	}
	
	public function from($date) {
		
		return $this;
	}
	
	
	protected function _setPostType() {
		
		$this->_args['post_type'] = $this->type;
	}
	
	
}