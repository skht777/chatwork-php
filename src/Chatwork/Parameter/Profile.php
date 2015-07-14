<?php
namespace Skht777\Chatwork\Parameter;
class Profile extends Base {
	
	public static function task() {
		return MyTask::make();
	}
}

class MyTask extends Base {
	use AssignedByAccountId, Status;
}