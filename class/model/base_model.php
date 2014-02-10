<?php
namespace Communities\Activity_Reports\Model;

class Base_Model {
	
	public $type;
	
	public $start;
	
	public $end;
	
	public $count;
	
	protected $_table;
	
	protected $_date_field;
	
	protected $_type_field;
	
	protected $_wpdb;
	
	protected $_current_date;
	
	protected $_query;
	
	protected $_sql;
	
	protected $_args = array();
	
	
	public function __construct() {
		
		global $wpdb;
		$this->_wpdb = $wpdb;
		
		$this->_current_date();
		$this->to();
	}
	
	public function get() {
	
		$this->_sql();
		
		$count = $this->_wpdb->get_var($this->_sql);
	
		$this->_count($count);
	
		return $this;
	}
	
	public function from($date_text) { //date_text would be '-1 week' for weekly and '1 month ago' for monthly
	
		$this->start = date('Y-m-d H:i:s', strtotime($date_text));
	
		return $this;
	}
	
	public function to($date = null) {
	
		if(! $date) {
				
			$this->end = $this->_current_date;
		}
	
		if(($dt = strtotime($date)) !== false) {
				
			$this->end = date('Y-m-d H:i:s', $dt);
		}
	
		return $this;
	}
	
	protected function _fields($table, $date_field, $type_field = null) {
		
		$this->_table = $table;
		$this->_date_field = $date_field;
		$this->_type_field = $type_field;
		
	}
	
	protected function _sql() {
	
		$this->_sql = "SELECT count(*) from {$this->_wpdb->{$this->_table}} WHERE {$this->_date_field} BETWEEN '{$this->start}' AND '{$this->end}' ";
		
		if($this->_type_field)
			$this->_sql .= "AND {$this->_type_field} = '{$this->type}'";
	}
	
	protected function _count($cnt) {
	
		$this->count = $cnt;
	}
	
	protected function _current_date() {
		
		$this->_current_date = date('Y-m-d H:i:s');
	}
	
	protected function _type($type) {
		 
		$this->type = $type;
	}
	
	
}