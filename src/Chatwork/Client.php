<?php
namespace Skht777\Chatwork;
use Skht777\Chatwork\API;
use Skht777\Util\RequestMethod as Method;
class Client {
	
	private $_token;
	
	protected function __construct($token) {
		$this->_token = strval($token);
	}
	
	public function profile() {
		return new API\Profile($this);
	}
	
	public function chat() {
		return new API\Chat($this);
	}
	
	protected function getToken() {
		return $this->_token;
	}
}