<?php
class Chatwork_Client {
	
	private $token;
	
	public function __construct($token) {
		$this->token = $token;
	}
	
	public function exec($path, $method, $content) {
		$path = rtrim(str_replace('/?', '?', $path), '/');
		return json_decode(file_get_contents($path, false, stream_context_create($this->createContext($method, $content))), true);
		//return array($path, $this->createContext($method, $content));
	}
	
	private function createContext($method, $content) {
		$header = array('X-ChatWorkToken: '.$this->token);
		$context = array('method' => $method);
		if($method !== 'GET') {
			$header[] = 'Content-Type: application/x-www-form-urlencoded';
			$context['content'] = $content;
		}
		return array('http' => $context + array('header' => implode("\n", $header)), 'ssl' => array('verify_peer' => false, 'verify_peer_name' => false));
	}
}