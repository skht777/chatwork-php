<?php
namespace Skht777\Chatwork;
use Skht777\Util\BuildRequest as Request;
use Skht777\Util\RequestMethod as Method;
class Client {
	
	private $_token;
	
	public function __construct($token) {
		$this->_token = $token;
	} 
	
	protected function getToken() {
		return $this->_token;
	}
	
	protected function request(Method $method, $path) {
		return Request::create($path, $method)->addHeader('X-ChatWorkToken', $this->_token)
				->setCallback(function($result) {return ($result) ? json_decode($result, true) : array();});
	}
}