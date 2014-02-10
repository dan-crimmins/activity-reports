<?php
namespace Communities\Activity_Reports\Report;

use Communities\Activity_Reports\Report\Report_Base;
use Communities\Activity_Reports\Report_Interface;
use Communities\Activity_Reports\Notifier\Report_Notifier_Interface;
use Communities\Activity_Reports\Activity_Utils;




class Weekly_Activity_Report extends Report_Base implements Report_Interface {
	
	public $last_weeks_data;
	
	public $deltas;
	
	
	public function run(Report_Notifier_Interface $notifier) {
		
		$view = Activity_Utils::view('weekly_email', array('data'	=> $this,
															'store' => Report_Data::getStore()), true); 
		
		
		$message = $notifier->setRecipients(Activity_Utils::option('recipients'))
							 ->setSubject(Report_Data::getStore() . ' Communities At A Glance Weekly Report')
							 ->setBody($view)
							 ->send();
		
	}
	
	public function getData() {
		
		$this->_comments();
		$this->_answers();
		$this->_posts();
		$this->_questions();
		$this->_threads();
		$this->_replies();
		$this->_users();
		$this->_last_week();
		$this->_calculateDeltas();
	}
	
	public function save() {
		
		update_option(Report_Data::reportOptionKey(time()), $this);
		
	}
	
	protected function _comments() {
		
		$this->comments = Report_Data::getWeeklyComments();
	}
	
	protected function _answers() {
		
		$this->answers = Report_Data::getWeeklyAnswers();
	}
	
	protected function _posts() {
		
		$this->posts = Report_Data::getWeeklyPosts();
	}
	
	protected function _questions() {
		
		$this->questions = Report_Data::getWeeklyQuestions();
	}
	
	protected function _threads() {
		
		$this->threads = Report_Data::getWeeklyThreads();
	}
	
	protected function _replies() {
		
		$this->replies = Report_Data::getWeeklyReplies();
	}
	
	protected function _users() {
		
		$this->users = Report_Data::getWeeklyUsers();
	}
	
	protected function _last_week() {
		
		$this->last_weeks_data = Report_Data::getLastWeeksData();
	}
	
	protected function _calculateDeltas() {
		
		if($this->last_weeks_data !== null) {
			
			$this->deltas = new stdClass();
			$this->deltas->comments = (int)$this->comments - (int)$this->last_weeks_data->comments;
			$this->deltas->answers = (int)$this->answers - (int)$this->last_weeks_data->answers;
			$this->deltas->posts = (int)$this->posts - (int)$this->last_weeks_data->posts;
			$this->deltas->questions = (int)$this->questions - (int)$this->last_weeks_data->questions;
			$this->deltas->threads = (int)$this->threads - (int)$this->last_weeks_data->threads;
			$this->deltas->replies = (int)$this->replies - (int)$this->last_weeks_data->replies;
			$this->deltas->users = (int)$this->users - (int)$this->last_weeks_data->users;
		}
	}
}