<?php
namespace Skht777\Chatwork;
class ClientBuilder extends Client {
	
	public static function create($token) {
		return new Client($token);
	}
}