<?php
class Chatwork {
	
	const ENDPOINT = "https://api.chatwork.com/v1/";
	private $token;
	
	public function __construct($token) {
		$this->token = $token;
	}
	
	public function exec($path, $method = 'GET', $content = null) {
		if(is_array($path)) $path = $this->buildPath($path);
		return json_decode(file_get_contents(Chatwork::ENDPOINT.$path, false, $this->createStreamContext($method, $content)), true);
		//return array(Chatwork::ENDPOINT.$path, $this->createStreamContext($method, $content));
	}
	
	private function buildPath(array $path) {
		$query = "";
		if(array_key_exists('query', $path)) {
			if(!empty($path['query'])) $query = '?'.http_build_query($path['query']);
			unset($path['query']);
		}
		$path = implode("/", $path);
		return $path.$query;
	}
	
	private function createStreamContext($method, $content) {
		$context = array('method' => $method, 'header' => 'X-ChatWorkToken: '.$this->token);
		if($content) $context += array('content' => http_build_query($content));
		return stream_context_create(array('http' => $context, 'ssl' => array('verify_peer' => false, 'verify_peer_name' => false)));
		//return array('http' => $context);
	}
}