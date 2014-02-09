<?php
namespace Communities\Activity_Reports;

interface Report_Interface {
	
	public function run();
	public function getData();
	public function save();
}