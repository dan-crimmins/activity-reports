<?php
namespace Communities\Activity_Reports\Report;

class Report_Data {
	
	public static function getStore() {
		
		return ucfirst(theme_option('brand'));
			
	}
	
	public static function reportOptionKey($report_date) {
		
		return SHC_ACTIVITY_REPORT_PREFIX . '-' . Report_Data::getStore() . '-' . 
				(is_int($report_date)) ? date('Y.m.d', $report_date) : date('Y.m.d', strtotime($report_date));
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
						 ->after('1 week ago')
						 ->get()
						 ->count;
						 
						 
	}
	
	public static function getWeeklyQuestions() {
		
		return Post_Model::factory('question')
						->after('1 week ago')
						->get()
						->count;
	}
	
	public static function getWeeklyThreads() {
		
		return Post_Model::factory('thread')
						 ->after('1 week ago')
						 ->get()
						 ->count;
	}
	
	public static function getWeeklyReplies() {
		
		return Post_Model::factory('reply')
						 ->after('1 week ago')
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
							->from('1 month ago')
							->get()
							->count;
	}
	
	public static function getMonthlyAnswers() {
		
		return Comment_Model::factory('answer')
							->from('1 month ago')
							->get()
							->count;
							
	}
	
	public static function getMonthlyPosts() {
		
		return Post_Model::factory('post')
						 ->after('1 month ago')
						 ->get()
						 ->count;
	}
	
	public static function getMonthlyQuestions() {
		
		return Post_Model::factory('question')
						->after('1 month ago')
						->get()
						->count;
	}
	
	public static function getMonthlyThreads() {
		
		return Post_Model::factory('thread')
						 ->after('1 month ago')
						 ->get()
						 ->count;
		
	}
	
	public static function getMonthlyReplies() {
		
		return Post_Model::factory('reply')
						->after('1 month ago')
						->get()
						->count;
	}
	
	public static function getMonthlyUsers() {
		
		return User_Model::factory()
 						->from('1 month ago')
 						->get()
 						->count;
						
	}
	
		
}
