<?php
namespace Communities\Activity_Reports\Notifier;


class Email_Notifier implements Report_Notifier_Interface {
	
	
	protected $_sender;
	
	protected $_recipients = array();
	
	protected $_subject;
	
	protected $_body;
	
	
	public function setSender($sender) {
		
		$this->_sender = $sender;
		
		return $this;
	}
	
	public function setRecipients($recipients) {
		
		$this->_recipients = (array) $recipients;
		
		return $this;
	}
	
	public function setSubject($subject) {
		
		$this->_subject = $subject;
		
		return $this;
	}
	
	public function setBody($body) {
		
		$this->_body = $body;
		
		return $this;
	}
	
	public function send() {
		
		 if(! $this->_sender) {
		 	
		 	$headers[] = "From: 'PHP Team' <phpteam@searshc.com>";
		 } 
		 
		 $headers[] = "Content-type:text/html;charset=UTF-8";
		
		 $sent = wp_mail($this->_recipients, $this->_subject, $this->_body, $headers);
		 
		 return $sent;
	}
}