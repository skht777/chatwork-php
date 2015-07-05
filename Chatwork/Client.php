<?php
include_once dirname(__FILE__).'/../Util/RequestBuilder.php';
class Chatwork_Client extends RequestBuilder {
	
	private $_token;
	
	public function __construct($token) {
		$this->_token = $token;
	}
	
	public function request(RequestMethod $method, $path) {
		return RequestBuilder::create($path, $method)->addHeader('X-ChatWorkToken', $this->_token)
				->setCallback(function($result) {return ($result) ? json_decode($result, true) : array();});
	}
}