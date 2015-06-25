<?php
class Chatwork_Client {
	
	private $token;
	
	public function __construct($token) {
		$this->token = $token;
	}
	
	public function exec($path, $method, $content) {
		//return json_decode(file_get_contents($path, false, stream_context_create($this->createContext($method, $content))), true);
		return array($path, $this->createContext($method, $content));
	}
	
	private function createContext($method, $content) {
		$context = array('method' => $method, 'header' => 'X-ChatWorkToken: '.$this->token);
		if($method !== 'GET') $context['content'] = $content;
		return array('http' => $context, 'ssl' => array('verify_peer' => false, 'verify_peer_name' => false));
	}
}