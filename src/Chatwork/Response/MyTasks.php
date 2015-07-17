<?php
namespace Skht777\Chatwork\Response;
class MyTasks extends Base {
	use TaskId, Room, AssignedByAccount, MessageId, Body, LimitTime, Status;
}