<?php
namespace Communities\Activity_Reports\Notifier;

interface Report_Notifier_Interface {
	
	public function setSender(string $sender);
	public function setRecipients(array $recipients);
	public function setSubject(string $subject);
	public function setBody(string $body);
	public function send();
	
}