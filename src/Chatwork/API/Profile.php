<?php
namespace Skht777\Chatwork\API;
use Skht777\Chatwork\Client;
use Skht777\Chatwork\API\Base as APIBase;
use Skht777\Chatwork\Parameter\MyTask;
class Profile extends APIBase {
	
	private $_information;
	private $_contacts;
	private $_belongs;
	
	public function __construct(Client $client) {
		parent::__construct($client, 'me');
		$this->_information = new UserInformation($client, 'my');
		$this->_contacts = new UserContact($client, 'contacts');
		$this->_belongs = new UserBelong($client, 'rooms');
	}
	
	public function getProfile() {
		return $this->getRequest();
	}
	
	public function getContacts() {
		return $this->_contacts->get();
	}
	
	public function getParticipatedChats() {
		return $this->_belongs->get();
	}
	
	public function getStatus() {
		return $this->_information->getStatus();
	}
	
	public function getTasks(MyTask $param = null) {
		return $this->_information->getTasks($param);
	}
}

class UserInformation extends APIBase {
	
	public function getStatus() {
		return $this->getRequest('status');
	}
	
	public function getTasks($param) { // デフォルトでは全ての未完了のタスク
		$this->setParam($param);
		return $this->getRequest('tasks');
	}
}

class UserContact extends APIBase {
	
	public function get() {
		return $this->getRequest();
	}
}

class UserBelong extends APIBase {
	
	public function get() {
		return $this->getRequest();
	}
}