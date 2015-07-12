<?php
class Chatwork_API_Base extends Chatwork_Client {
	
	const ENDPOINT = "https://api.chatwork.com/v1";
	
	protected $_endpoint;
	
	public function __construct(Chatwork_Client $client,  $endpoint) {
		parent::__construct($client->getToken());
		$this->_endpoint = $endpoint;
	}
	
	protected static function getURI(...$url) {
		return implode('/', $url);
	}
	
	protected function getRequest($path = '') {
		return $this->request(RequestMethod::GET(), $this->getURI(self::ENDPOINT, $this->_endpoint, $path));
	}
	
	protected function postRequest(RequestMethod $method, $path = '') {
		return $this->request($method, $this->getURI(self::ENDPOINT, $this->_endpoint, $path));
	}
}