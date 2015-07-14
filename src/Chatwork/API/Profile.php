<?php
namespace Skht777\Chatwork\API;
use Skht777\Chatwork\Client;
use Skht777\Chatwork\API\Base as APIBase;
class Profile extends APIBase {
	
	public $information;
	private $_contacts;
	private $_belongs;
	
	protected function __construct(Client $client) {
		parent::__construct($client, 'me');
		$this->information = new UserInformation($client);
		$this->_contacts = new UserContact($client);
		$this->_belongs = new UserBelong($client);
	}
	
	public function getProfile() {
		return $this->getRequest()->exec();
	}
	
	public function getContacts() {
		return $this->_contacts->get();
	}
	
	public function getParticipatedChats() {
		return $this->_belongs->get();
	}
}

class UserInformation extends Base {
	
	protected function __construct(Client $client) {
		parent::__construct($client, 'my');
	}
	
	public function getStatus() {
		return $this->getRequest('status')->exec();
	}
	
	public function getTasks(array $options = array()) { // デフォルトでは全ての未完了のタスク
		return $this->getRequest('tasks')->setQuery($options)->exec();
	}
}

class UserContact extends Base {
	
	protected function __construct(Client $client) {
		parent::__construct($client, 'contacts');
	}
	
	public function get() {
		return $this->getRequest()->exec();
	}
}

class UserBelong extends Base {
	
	protected function __construct(Client $client) {
		parent::__construct($client, 'rooms');
	}
	
	public function get() {
		return $this->getRequest()->exec();
	}
}