<?php
namespace Skht777\Chatwork\Response;
class TasksGET extends Base {
	use ListIterator;
	
	protected function getObject(array $array) {
		return new TasksIdGET($array);
	}
}