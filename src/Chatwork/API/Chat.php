<?php
namespace Skht777\Chatwork\API;
use Skht777\Chatwork\Client;
use Skht777\Chatwork\API\Base as APIBase;
use Skht777\Util\RequestMethod as Method;
include_once dirname(__FILE__)."/Base.php";
class Chat extends APIBase {
	
	public $room;
	
	public function __construct(Client $client) {
		parent::__construct($client, 'rooms');
	}
	
	public function createChatRoom($name, $adminMembers, array $options = array()) {
		return $this->postRequest(Method::POST())
				->setBody(array('name' => $name, 'members_admin_ids' => $adminMembers) + $options)->exec();
	}
	
	public function getChatRoom($room_id) {
		$this->room = new Chatroom($this, $room_id);
		return $this->room;
	}
}

class ChatRoom extends APIBase {

	private $_id;
	public $task;
	public $file;
	public $message;
	
	public function __construct(Client $client, $room_id) {
		parent::__construct($client, self::getURI('rooms', $room_id));
		$this->_id = $room_id;
	}
	
	public function deleteChatRoom($action) {
		$this->postRequest(Method::DELETE())->setBody(array('action_type' => $action))->exec();
	}

	public function getInformation() {
		return $this->getRequest()->exec();
	}

	public function updateInformation(array $options = array()) {
		return $this->postRequest(Method::PUT())->setBody($options)->exec();
	}
	
	public function getMembers() {
		return $this->getRequest('members')->exec();
	}
	
	public function editMembers($adminMembers, array $options = array()) {
		return $this->postRequest(Method::PUT(), 'members')
				->setBody(array('members_admin_ids' => $adminMembers) + $options)->exec();
	}
	
	public function getMessages($force = false) {
		return $this->getRequest('messages')->setQuery(array('force' => ($force) ? 1 : 0))->exec();
	}
	
	public function postMessage($body) {
		return $this->postRequest(Method::POST(), 'messages')->setBody(array('body' => $body))->exec();
	}
	
	public function getMessageInformation($message_id) {
		$this->message = new ObjectInformation($this, $this->_id, $message_id, 'messages');
		return $this->message->get();
	}
	
	public function getTasks($options = array()) {
		return $this->getRequest('tasks')->setQuery($options)->exec();
	}
	
	public function getTaskInformation($task_id) {
		$this->task = new ObjectInformation($this, $this->_id, $task_id, 'tasks');
		return $this->task->get();
	}
	
	public function createTask($body, $tos, $limit = null) {
		$params = array('body' => $body, 'to_ids' => $tos);
		if($limit) $params += array('limit' => $limit);
		return $this->postRequest(Method::POST(), 'tasks')->setBody($params)->exec();
	}
	
	public function getfiles($user = 0) {
		$user = ($user != 0) ? array('account_id' => $user) : array();
		return $this->getRequest('files')->setQuery($user)->exec();
	}
	
	public function getfileInformation($file_id, $create_url = true) {
		$this->file = new ObjectInformation($this, $this->_id, $file_id, 'files');
		return $this->file->get(array('create_download_url' => ($create_url) ? 1 : 0));
	}
}

class ObjectInformation extends APIBase {
	
	private $_id;
	
	public function __construct(Client $client, $room_id, $target_id, $type) {
		parent::__construct($client, self::getURI('rooms', $room_id, $type, $target_id));
		$this->_id = $target_id;
	}
	
	public function get($params = array()) {
		return $this->getRequest()->setQuery($params)->exec();
	}
}