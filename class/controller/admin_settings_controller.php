<?php
namespace Communities\Activity_Reports;

class Admin_Settings_Controller {
	
	public $settings_field;
	
	public $options;
	
	public $prefix;
	
	
	public function __construct() {
		
		$this->prefix = SHC_ACTIVITY_REPORT_PREFIX;
		$this->settings_field = $this->prefix . 'settings';
		$this->options = Activity_Utils::options();
		
		add_action('admin_menu', array(&$this, 'menu'));
		add_action('admin_init', array(&$this, 'register_settings'));
		
	}
	
	public function menu() {
	
		add_options_page('Activity Report Settings', 'Activity Report Settings', 'activity_report_admin', 'activity-reports-settings', array(&$this, 'settings_page'));
	}
	
	public function register_settings() {
	
		register_setting($this->settings_field, $this->settings_field, array($this, 'settings_save'));
	
		//Report paramters
		add_settings_section(SHC_ACTIVITY_REPORT_PREFIX . 'parameter_section', __('Activity Report Settings'), array(&$this, 'parameter_section'), 'activity-reports-settings');
		add_settings_field('weekly_day', __('Day of week'), array(&$this, 'day_of_week'), 'activity-reports-settings', SHC_ACTIVITY_REPORT_PREFIX . 'parameter_section');
		add_settings_field('recipients', __('Email recipients'), array(&$this, 'recipients'), 'activity-reports-settings', SHC_ACTIVITY_REPORT_PREFIX . 'parameter_section');
	
	}
	
	public function parameter_section() {
	
		echo '<p>' . __('Activity Reports Parameters.') . '</p>';
	}
	
	
	
	public function day_of_week() {
	
		Activity_Utils::view('form/input_select', array('name' 	=> $this->settings_field . '[weekly_day]',
														'id' 	=> SHC_ACTIVITY_REPORT_PREFIX . 'weekly-day',
													    'selected' => $this->options['weekly_day'],
														'options'=> array('sunday' 		=> 'Sunday',
																		  'monday'		=> 'Monday',
																		  'tuesday'		=> 'Tuesday',
																		  'wednesday'	=> 'Wednesday',
																		  'thursday'	=> 'Thursday',
																		  'friday'		=> 'Friday',
																		  'saturday'	=> 'Saturday')));
	
	}
	
	public function recipients() {
	
		Activity_Utils::view('form/input_text', array('name'		=> $this->settings_field . '[recipients]',
													  'id'			=> SHC_ACTIVITY_REPORT_PREFIX . 'recipients',
													  'value'		=> implode(',', $this->options['recipients'])));
	}
	
	
	
	public function settings_save($settings) {
	
		$settings['recipients'] = explode(',', preg_replace('/\s/', '', $settings['recipients']));
		
		return $settings;
	}
	
	public function settings_page() {
	
		Activity_Utils::view('admin/settings', array('settings_field' => $this->settings_field,
													'settings_section' => 'activity-reports-settings'));
	}
}