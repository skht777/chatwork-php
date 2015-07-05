<?php
include_once dirname(__FILE__)."/Base.php";

class Chatwork_API_Chat extends Chatwork_API_Base {
	
	public $room;
	
	public function __construct(Chatwork_Client $client) {
		parent::__construct($client, 'rooms');
	}
	
	public function createChatRoom($name, $adminMembers, array $options = array()) {
		return $this->exec('', Chatwork_API_Base::POST, array('name' => $name, 'members_admin_ids' => $adminMembers) + $options);
	}
	
	public function getChatRoom($room_id) {
		$this->room = new Chatwork_API_Chatroom($this->_client, $room_id);
		return $this->room;
	}
}

class Chatwork_API_ChatRoom extends Chatwork_API_Base {

	private $_id;
	public $task;
	public $file;
	public $message;
	
	public function __construct(Chatwork_Client $client, $room_id) {
		parent::__construct($client, Chatwork_API_ChatRoom::getURI('rooms', $room_id));
		$this->_id = $room_id;
	}
	
	public function deleteChatRoom($action) {
		$this->exec('', Chatwork_API_Base::DELETE, array('action_type' => $action));
	}

	public function getInformation() {
		return $this->execGet();
	}

	public function updateInformation(array $options = array()) {
		return $this->exec('', Chatwork_API_Base::PUT, $options);
	}
	
	public function getMembers() {
		return $this->execGet('members');
	}
	
	public function editMembers($adminMembers, array $options = array()) {
		return $this->exec('members', Chatwork_API_Base::PUT, array('members_admin_ids' => $adminMembers) + $options);
	}
	
	public function getMessages($force = false) {
		return $this->execGet('messages', array('force' => ($force) ? 1 : 0));
	}
	
	public function postMessage($body) {
		return $this->exec('messages', Chatwork_API_ChatRoom::POST, array('body' => $body));
	}
	
	public function getMessageInformation($message_id) {
		$this->message = new Chatwork_API_ObjectInformation($this->_client, $this->_id, $message_id, 'messages');
		return $this->message->get();
	}
	
	public function getTasks($options = array()) {
		return $this->execGet('tasks');
	}
	
	public function getTaskInformation($task_id) {
		$this->task = new Chatwork_API_ObjectInformation($this->_client, $this->_id, $task_id, 'tasks');
		return $this->task->get();
	}
	
	public function createTask($body, $tos, $limit = null) {
		$params = array('body' => $body, 'to_ids' => $tos);
		if($limit) $params += array('limit' => $limit);
		return $this->exec('tasks', Chatwork_API_Base::POST, $params);
	}
	
	public function getfiles($user = 0) {
		$user = ($user != 0) ? array('account_id' => $user) : array();
		return $this->execGet('files', $user);
	}
	
	public function getfileInformation($file_id, $create_url = true) {
		$this->file = new Chatwork_API_ObjectInformation($this->_client, $this->_id, $file_id, 'files');
		return $this->file->get(array('create_download_url' => ($create_url) ? 1 : 0));
	}
}

class Chatwork_API_ObjectInformation extends Chatwork_API_Base {
	
	private $_id;
	
	public function __construct(Chatwork_Client $client, $room_id, $target_id, $type) {
		parent::__construct($client, Chatwork_API_ObjectInformation::getURI('rooms', $room_id, $type));
		$this->_id = $target_id;
	}
	
	public function get($params = array()) {
		return $this->execGet($this->_id, $params);
	}
}