<?php
namespace Skht777\Chatwork\Response;
class RoomsGET extends Base {
	use ListIterator;
	
	protected function getObject(array $array) {
		return new RoomsIdGETRaw($array);
	}
}

class RoomsIdGETRaw {
	use RoomId, Name, Type, Role, Sticky, UnreadNum, MentionNum,MytaskNum,
	MessageNum, FileNum, TaskNum, IconPath, LastUpdateTime;
}