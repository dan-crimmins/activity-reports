<?php
namespace Communities\Activity_Reports;

use Communities\Activity_Reports\Notifier\Report_Notifier_Interface;

interface Report_Interface {
	
	public function run(Report_Notifier_Interface $notifier);
	public function getData();
	public function save();
}