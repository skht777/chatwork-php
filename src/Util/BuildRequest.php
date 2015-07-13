<?php
namespace Skht777\Util;
use Skht777\Util\RequestMethod as Method;
class BuildRequest {
	
	private $_path;
	private $_query;
	private $_method;
	private $_header;
	private $_content;
	private $_callback;
	
	private function __construct($path, $method) {
		$this->_path = $path;
		$this->_method = $method;
		$this->_query = array();
		$this->_header = array();
		$this->_content = array();
	}
	
	public function create($path, Method $method) {
		return new BuildRequest($path, $method);
	}
	
	public function exec() {
		$result = file_get_contents($this->getPath(), false, stream_context_create($this->getContext()));
		return ($this->_callback) ? call_user_func($this->_callback, $result) : $result;
		//return array($this->getPath(), $this->getContext()); // プレフィックスチェック用
	}
	
	public function addHeader($name, $value) {
		$this->_header[] = $name.": ".$value;
		return $this;
	}
	
	public function setQuery(array $query) {
		$this->_query = $query;
		return $this;
	}
	
	public function setBody(array $content) {
		$this->_content = $content;
		return $this;
	}
	
	public function setCallback(callable $func) {
		$this->_callback = $func;
		return $this;
	}
	
	private function getPath() {
		return rtrim($this->getPathWithQuery($this->_path, $this->_query), '/');
	}
	
	private function getContext() {
		return $this->createContext($this->_method, $this->_content);
	}
	
	private function getPathWithQuery($path, array $query) {
		if(empty($query)) return $path;
		return str_replace('/?', '?', $path.'?'.http_build_query($query));
	}
	
	private function createContext($method, $contents) {
		$context = array(
				'http' => array('method' => $method->value()),
				'ssl' => array('verify_peer' => false, 'verify_peer_name' => false)
		);
		if(!$method->equals(Method::GET)) {
			$this->addHeader('Content-Type', 'application/x-www-form-urlencoded');
			$context['http']['content'] = http_build_query($contents);
		}
		$context['http']['header'] = implode("\n", $this->_header);
		return $context;
	}
}