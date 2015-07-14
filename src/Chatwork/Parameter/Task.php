<?php
namespace Skht777\Chatwork\Parameter;

class Task extends Base{
	
	public static function create($body, ... $ids) {
		return CreateTask::make()->setBody($body)->setToIds(... $ids);
	}
	
	public static function get() {
		return GetTask::make();
	}
}

class CreateTask extends Base {
	use Body, ToIds, Limit;
}

class GetTask extends Base {
	use AccountId, AssignedByAccountId, Status;
}