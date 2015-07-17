<?php
namespace Skht777\Chatwork\Response;
class MessagesGET extends Base {
	use ListIterator;
	
	protected function getObject(array $array) {
		return new MessagesIdGET($array);
	}
}