<?php
class Chatwork_API_Base {
	
	const POST = 'POST';
	const PUT = 'PUT';
	const DELETE = 'DELETE';
	
	protected $_client;
	
	public function __construct(Chatwork $client) {
		$this->_client = $client;
	}
}