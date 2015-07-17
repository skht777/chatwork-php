<?php
namespace Skht777\Chatwork\Response;
class TasksIdGET extends Base {
	use TaskId, Account, AssignedByAccount, MessageId, Body, LimitTime, Status;
}