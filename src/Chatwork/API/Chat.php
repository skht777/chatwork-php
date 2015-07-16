<?php
namespace Skht777\Chatwork\API;
use Skht777\Chatwork\Client;
use Skht777\Chatwork\API\Base as APIBase;
use Skht777\Chatwork\Parameter as Param;
use Skht777\Util\RequestMethod as Method;
class Chat extends APIBase {
	
	public function __construct(Client $client) {
		parent::__construct($client, 'rooms');
	}
	
	public function createChatRoom(Param\CreateRoom $param) {
		$this->setParam($param);
		return $this->postRequest(Method::POST());
	}
	
	public function getChatRoom($roomId) {
		return new Chatroom($this, self::getURI($this->_endpoint, $roomId));
	}
}

class ChatRoom extends APIBase {
	
	public function deleteChatRoom(Param\DeleteRoom $param) {
		$this->setParam($param);
		$this->postRequest(Method::DELETE());
	}

	public function getInformation() {
		return $this->getRequest();
	}

	public function updateInformation(Param\EditRoom $param = null) {
		$this->setParam($param);
		return $this->postRequest(Method::PUT());
	}
	
	public function getMembers() {
		return $this->getRequest('members');
	}
	
	public function editMembers(Param\EditRoomMember $param) {
		$this->setParam($param);
		return $this->postRequest(Method::PUT(), 'members');
	}
	
	public function getMessages(Param\GetMessage $param = null) {
		$this->setParam($param);
		return $this->getRequest('messages');
	}
	
	public function postMessage(Param\CreateMessage $param) {
		$this->setParam($param);
		return $this->postRequest(Method::POST(), 'messages');
	}
	
	public function getMessageInformation($messageId) {
		return (new ObjectInformation($this, self::getURI($this->_endpoint, 'messages', $messageId)))->get();
	}
	
	public function getTasks(Param\GetTask $param = null) {
		$this->setParam($param);
		return $this->getRequest('tasks');
	}
	
	public function getTaskInformation($taskId) {
		return (new ObjectInformation($this, self::getURI($this->_endpoint, 'tasks', $taskId)))->get();
	}
	
	public function createTask(Param\CreateTask $param) {
		$this->setParam($param);
		return $this->postRequest(Method::POST(), 'tasks');
	}
	
	public function getfiles(Param\GetFile $param = null) {
		$this->setParam($param);
		return $this->getRequest('files');
	}
	
	public function getfileInformation($fileId, Param\GetFileInformation $param) {
		return (new ObjectInformation($this, self::getURI($this->_endpoint, 'files', $fileId)))->get($param);
	}
}

class ObjectInformation extends APIBase {
	
	public function get($param = null) {
		$this->setParam($param);
		return $this->getRequest();
	}
}