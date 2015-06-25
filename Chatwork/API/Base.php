<?php
class Chatwork_API_Base {
	
	const ENDPOINT = "https://api.chatwork.com/v1/";
	const POST = 'POST';
	const PUT = 'PUT';
	const DELETE = 'DELETE';
	
	protected $_client;
	protected $_endpoint;
	
	protected function __construct(Chatwork_Client $client,  $endpoint) {
		$this->_client = $client;
		$this->_endpoint = $endpoint;
	}
	
	protected static function getURI(...$url) {
		return implode('/', $url);
	}
	
	protected function execGet($path = null, array $query = array()) {
		if(!empty($query)) $path = $path.'?'.http_build_query($query);
		return $this->_client->exec(str_replace('/?', '?', Chatwork_API_Base::getURI(Chatwork_API_Base::ENDPOINT, $this->_endpoint)), 'GET', null);
	}
	
	protected function exec($path, $method, array $contents) {
		return $this->_client->exec(Chatwork_API_Base::getURI(Chatwork_API_Base::ENDPOINT, $this->_endpoint, $path), $method, http_build_query($contents));
	}
}