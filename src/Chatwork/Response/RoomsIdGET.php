<?php
namespace Skht777\Chatwork\Response;
class RoomsIdGET extends Base {
	use RoomId, Name, Type, Role, Sticky, UnreadNum, MentionNum,MytaskNum,
	MessageNum, FileNum, TaskNum, IconPath, LastUpdateTime, Description;
}