<?php
class Chatwork_API_Base {
	
	const ENDPOINT = "https://api.chatwork.com/v1";
	
	protected $_client;
	protected $_endpoint;
	
	protected function __construct(Chatwork_Client $client,  $endpoint) {
		$this->_client = $client;
		$this->_endpoint = $endpoint;
	}
	
	protected static function getURI(...$url) {
		return implode('/', $url);
	}
	
	protected function getRequest($path = '') {
		return $this->_client->request(RequestMethod::GET(), $this->getURI(self::ENDPOINT, $this->_endpoint, $path));
	}
	
	protected function postRequest(RequestMethod $method, $path = '') {
		return $this->_client->request($method, $this->getURI(self::ENDPOINT, $this->_endpoint, $path));
	}
}