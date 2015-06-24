<?php
include_once dirname(__FILE__)."/Chatwork_API_Base.php";
class Chatwork_Profile extends Chatwork_API_Base {
	
	public function getProfile() {
		return $this->_client->exec('me');
	}
	
	public function getStatus() {
		return $this->_client->exec(array('my', 'status'));
	}
	
	public function getTasks($options = array()) { // デフォルトでは全ての未完了のタスク
		return $this->_client->exec(array('my', 'tasks', 'query' => $options));
	}
	
	public function getContacts() {
		return $this->_client->exec('contacts');
	}
}