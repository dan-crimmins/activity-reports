<?php
namespace Communities\Activity_Reports\Controller;

use Communities\Activity_Reports\Report_Interface;
use Communities\Activity_Reports\Notifier\Email_Notifier;



class Report_Generator_Controller {
	
	public $report;
	
	
	public function __construct(Report_Interface $report) {
		
		$this->report = $report;
		
	}
	
	public static function factory(Report_Interface $report) {
		
		return new Report_Generator_Controller($report);
	}
	
	public function run() {
		
		$this->report->getData();
		$this->report->run(new Email_Notifier);
		$this->report->save();
	}
	
	
}