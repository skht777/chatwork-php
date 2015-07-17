<?php
namespace Skht777\Chatwork\API;
use Skht777\Chatwork;
use Skht777\Chatwork\Client;
use Skht777\Util\RequestMethod as Method;
use Skht777\Util\BuildRequest as Request;
use Skht777\Chatwork\Response\ResponseBuilder as Response;
class Base extends Client {
	
	const ENDPOINT = "https://api.chatwork.com/v1";
	
	protected $_endpoint;
	private $_param;
	
	protected function __construct(Client $client, $endpoint) {
		parent::__construct($client->getToken());
		$this->_endpoint = $endpoint;
		$this->_param = array();
	}
	
	protected static function getURI(... $url) {
		return implode('/', $url);
	}
	
	protected function setParam($param) {
		if($param != null) $this->_param = $param->getValue();
	}
	
	protected function getRequest($path = '') {
		return $this->exec($path, Method::GET(), $this->request($path)->setQuery($this->paramWithReset()));
	}
	
	protected function postRequest(Method $method, $path = '') {
		return $this->exec($path, $method, $this->request($path)->setMethod($method)->setBody($this->paramWithReset()));
	}
	
	private function request($path) {
		return Request::create(self::getURI(self::ENDPOINT, $this->_endpoint, $path))
		->addHeader('X-ChatWorkToken', $this->getToken())
		->setCallback(function($result){return $this->getJson($result);});
	}
	
	private function exec($path, Method $method, Request $request) {
		return Response::getInstance(self::getURI($this->_endpoint, $path), $method, $request->exec());
	}
	
	private function paramWithReset() {
		$param = $this->_param;
		$this->_param = array();
		return $param;
	}
	
	private function getJson($result) {
		return ($result) ? json_decode($result, true) : array();
	}
}