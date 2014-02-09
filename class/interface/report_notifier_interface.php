<?php
namespace Communities\Activity_Reports\Notifier;

interface Report_Notifier_Interface {
	
	public function setSender($sender);
	public function setRecipients($recipients);
	public function setSubject($subject);
	public function setBody($body);
	public function send();
	
}