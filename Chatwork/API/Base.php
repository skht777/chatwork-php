<?php
namespace skht777\Chatwork\API;
use skht777\Chatwork\Client;
use skht777\Util\RequestMethod as Method;
class Base extends Client {
	
	const ENDPOINT = "https://api.chatwork.com/v1";
	
	protected $_endpoint;
	
	public function __construct(Client $client,  $endpoint) {
		parent::__construct($client->getToken());
		$this->_endpoint = $endpoint;
	}
	
	protected static function getURI(...$url) {
		return implode('/', $url);
	}
	
	protected function getRequest($path = '') {
		return $this->request(Method::GET(), self::getURI(self::ENDPOINT, $this->_endpoint, $path));
	}
	
	protected function postRequest(Method $method, $path = '') {
		return $this->request($method, self::getURI(self::ENDPOINT, $this->_endpoint, $path));
	}
}