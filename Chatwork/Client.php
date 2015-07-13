<?php
namespace skht777\Chatwork;
use skht777\Util\RequestBuilder as Request;
use skht777\Util\RequestMethod as Method;
include_once dirname(__FILE__).'/../Util/RequestBuilder.php';
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