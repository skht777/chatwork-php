<?php
namespace Skht777\Chatwork\API;
use Skht777\Chatwork\Client;
use Skht777\Chatwork\API\Base as APIBase;
use Skht777\Util\RequestMethod as Method;
class Chat extends APIBase {
	
	public function __construct(Client $client) {
		parent::__construct($client, 'rooms');
	}
	
	public function createChatRoom($name, $adminMembers, array $options = array()) {
		return $this->postRequest(Method::POST())
				->setBody(array('name' => $name, 'members_admin_ids' => $adminMembers) + $options)->exec();
	}
	
	public function getChatRoom($roomId) {
		return new Chatroom($this, self::getURI($this->_endpoint, $roomId));
	}
}

class ChatRoom extends APIBase {
	
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
	
	public function getMessageInformation($messageId) {
		return (new ObjectInformation($this, self::getURI($this->_endpoint, 'messages', $messageId)))->get();
	}
	
	public function getTasks($options = array()) {
		return $this->getRequest('tasks')->setQuery($options)->exec();
	}
	
	public function getTaskInformation($taskId) {
		return (new ObjectInformation($this, self::getURI($this->_endpoint, 'tasks', $taskId)))->get();
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
	
	public function getfileInformation($fileId, $create_url = true) {
		return (new ObjectInformation($this, self::getURI($this->_endpoint, 'files', $fileId)))->get(array('create_download_url' => ($create_url) ? 1 : 0));
	}
}

class ObjectInformation extends APIBase {
	
	public function get($params = array()) {
		return $this->getRequest()->setQuery($params)->exec();
	}
}