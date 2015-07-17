<?php
namespace Skht777\Chatwork\Response;
class MyStatus extends Base {
	use UnreadRoomNum, MentionRoomNum, MytaskRoomNum, UnreadNum, MentionNum, MytaskNum;
}