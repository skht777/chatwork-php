<?php
include_once dirname(__FILE__).'/Base.php';
class Chatwork_API_Profile extends Chatwork_API_Base {
	
	public $information;
	private $_contacts;
	private $_belongs;
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'me');
		$this->information = new Chatwork_API_UserInformation($client);
		$this->_contacts = new Chatwork_API_UserContact($client);
		$this->_belongs = new Catwork_API_UserBelong($client);
	}
	
	public function getProfile() {
		return $this->getRequest()->exec();
	}
	
	public function getContacts() {
		return $this->_contacts->get();
	}
	
	public function getParticipatedChats() {
		return $this->_belongs->getParticipatedChat();
	}
}

class Chatwork_API_UserInformation extends Chatwork_API_Base {
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'my');
	}
	
	public function getStatus() {
		return $this->getRequest('status')->exec();
	}
	
	public function getTasks(array $options = array()) { // デフォルトでは全ての未完了のタスク
		return $this->getRequest('tasks')->setQuery($options)->exec();
	}
}

class Chatwork_API_UserContact extends Chatwork_API_Base {
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'contacts');
	}
	
	public function get() {
		return $this->getRequest()->exec();
	}
}

class Catwork_API_UserBelong extends Chatwork_API_Base {
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'rooms');
	}
	
	public function getParticipatedChat() {
		return $this->getRequest()->exec();
	}
}