<?php
namespace Skht777\Chatwork\Response;
class RoomsGET extends Base {
	use ListIterator;
	
	protected function getObject(array $array) {
		return new RoomsIdGET($array);
	}
}