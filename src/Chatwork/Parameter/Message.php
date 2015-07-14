<?php
namespace Skht777\Chatwork\Parameter;
use Skht777\Chatwork\Parameter\Base;
use Skht777\Chatwork\Parameter as Param;
class Message extends Base {
	
	public static function get() {
		return GetMessage::make();
	}
	
	public static function create($body) {
		return CreateMessage::make()->setBody($body);
	}
}

class CreateMessage extends Base {
	use Param\Body;
}

class GetMessage extends Base {
	use Param\Force;
}