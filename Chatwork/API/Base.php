<?php
class Chatwork_API_Base {
	
	const ENDPOINT = "https://api.chatwork.com/v1";
	const POST = 'POST';
	const PUT = 'PUT';
	const DELETE = 'DELETE';
	
	protected $_client;
	protected $_endpoint;
	
	protected function __construct(Chatwork_Client $client,  $endpoint) {
		$this->_client = $client;
		$this->_endpoint = $endpoint;
	}
	
	protected function execGet($path, array $query = array()) {
		if(!empty($query)) $path = $path.'?'.http_build_query($query);
		return $this->_client->exec($this->getURI($path), 'GET', null);
	}
	
	protected function exec($path, $method, array $contents) {
		return $this->_client->exec($this->getURI($path), $method, http_build_query($contents));
	}
	
	private function getURI($path) {
		return implode('/', array(Chatwork_API_Base::ENDPOINT, $this->_endpoint, $path));
	}
}