<?php
include_once dirname(__FILE__).'/Base.php';
class Chatwork_API_Profile extends Chatwork_API_Base {
	
	public $information;
	private $_contacts;
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'me');
		$this->information = new Chatwork_API_UserInformation($client);
		$this->_contacts = new Chatwork_API_UserContact($client);
	}
	
	public function getProfile() {
		return $this->execGet('');
	}
	
	public function getContacts() {
		return $this->_contacts->get();
	}
}

class Chatwork_API_UserInformation extends Chatwork_API_Base {
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'my');
	}
	
	public function getStatus() {
		return $this->execGet('status');
	}
	
	public function getTasks(array $options = array()) { // デフォルトでは全ての未完了のタスク
		return $this->execGet('tasks', $options);
	}
}

class Chatwork_API_UserContact extends Chatwork_API_Base {
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'contacts');
	}
	
	public function get() {
		return $this->execGet('');
	}
}