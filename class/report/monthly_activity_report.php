<?php
namespace Communities\Activity_Reports\Report;

use Communities\Activity_Reports\Report\Report_Base;
use Communities\Activity_Reports\Report_Interface;
use Communities\Activity_Reports\Notifier\Report_Notifier_Interface;
use Communities\Activity_Reports\Activity_Utils;




class Monthly_Activity_Report extends Report_Base implements Report_Interface {

	
	public function run(Report_Notifier_Interface $notifier) {

		$view = Activity_Utils::view('monthly_email', array('data'	=> $this,
															'store' => Report_Data::getStore()), true);


		$message = $notifier->setRecipients(Activity_Utils::options('recipients'))
							->setSubject(Report_Data::getStore() . ' Communities Monthly Report')
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

	}

	public function save() {

		update_option(Report_Data::monthlyReportOptionKey(time()), $this);

	}

	protected function _comments() {

		$this->comments = Report_Data::getMonthlyComments();
	}

	protected function _answers() {

		$this->answers = Report_Data::getMonthlyAnswers();
	}

	protected function _posts() {

		$this->posts = Report_Data::getMonthlyPosts();
	}

	protected function _questions() {

		$this->questions = Report_Data::getMonthlyQuestions();
	}

	protected function _threads() {

		$this->threads = Report_Data::getMonthlyThreads();
	}

	protected function _replies() {

		$this->replies = Report_Data::getMonthlyReplies();
	}

	protected function _users() {

		$this->users = Report_Data::getMonthlyUsers();
	}

}