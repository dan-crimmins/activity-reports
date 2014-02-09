<?php
namespace Communities\Activity_Reports\Report;

use Communities\Activity_Reports\Model\Comment_Model;
use Communities\Activity_Reports\Model\Post_Model;
use Communities\Activity_Reports\Model\User_Model;

class Report_Data {
	
	public static function getStore() {
		
		return ucfirst(theme_option('brand'));
			
	}
	
	//For weekly
	public static function reportOptionKey($report_date) {
		
		return SHC_ACTIVITY_REPORT_PREFIX . '-' . Report_Data::getStore() . '-' . 
				(is_int($report_date)) ? date('Y.m.d', $report_date) : date('Y.m.d', strtotime($report_date));
	}
	
	public static function monthlyReportOptionKey($report_date) {
		
		return SHC_ACTIVITY_REPORT_PREFIX . '-' . Report_Data::getStore() . '-' .
				(is_int($report_date)) ? date('Y.m', $report_date) : date('Y.m', strtotime($report_date));
	}
	
	public static function getWeeklyComments() {
		
		return Comment_Model::factory('')
							->from('-1 week')
							->get()
							->count;
	}
	
	public static function getWeeklyAnswers() {
		
		return Comment_Model::factory('answer')
							->from('-1 week')
							->get()
							->count;
	}
	
	public static function getWeeklyPosts() {
		
		return Post_Model::factory('post') 
						 ->from('-1 week')
						 ->get()
						 ->count;
						 
						 
	}
	
	public static function getWeeklyQuestions() {
		
		return Post_Model::factory('question')
						->from('-1 week')
						->get()
						->count;
	}
	
	public static function getWeeklyThreads() {
		
		return Post_Model::factory('thread')
						 ->from('-1 week')
						 ->get()
						 ->count;
	}
	
	public static function getWeeklyReplies() {
		
		return Post_Model::factory('reply')
						 ->from('-1 week')
					 	 ->get()
				 	 	 ->count;
	}
	
	public static function getWeeklyUsers() {
		
		return User_Model::factory()
						  ->from('-1 week')
						  ->get()
						  ->count;
		
	}
	
	public static function getLastWeeksData() {
		
		 return get_option(self::reportOptionKey(date('-1 week')), null);
	}
	
	
	
	
	/*
	 * Monthly Report Data methods
	 */
	public static function getMonthlyComments() {
		
		return Comment_Model::factory('')
							->from('first day of this month')
							->get()
							->count;
	}
	
	public static function getMonthlyAnswers() {
		
		return Comment_Model::factory('answer')
							->from('first day of this month')
							->get()
							->count;
							
	}
	
	public static function getMonthlyPosts() {
		
		return Post_Model::factory('post')
						 ->from('first day of this month')
						 ->get()
						 ->count;
	}
	
	public static function getMonthlyQuestions() {
		
		return Post_Model::factory('question')
						->from('first day of this month')
						->get()
						->count;
	}
	
	public static function getMonthlyThreads() {
		
		return Post_Model::factory('thread')
						 ->from('first day of this month')
						 ->get()
						 ->count;
		
	}
	
	public static function getMonthlyReplies() {
		
		return Post_Model::factory('reply')
						->from('first day of this month')
						->get()
						->count;
	}
	
	public static function getMonthlyUsers() {
		
		return User_Model::factory()
 						->from('first day of this month')
 						->get()
 						->count;
						
	}
	
		
}
