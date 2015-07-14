<?php
namespace Skht777\Chatwork\Parameter;
class Room extends Base {
	
	public static function create($name, ... $ids){
		return CreateRoom::make()->setName($name)->setMembersAdminIds(... $ids);
	}
	
	public static function edit(){
		return EditRoom::make();
	}
	
	public static function member(){
		return EditRoomMember::make()->setMembersAdminIds(... $ids);
	}
	
	public static function delete(Enum\ActionEnum $action){
		return DeleteRoom::make()->setActionType($action);
	}
}

class CreateRoom extends Base {
	use Name, MembersAdminIds, Description, IconPreset, MembersMemberIds, MembersReadonlyIds;
}

class EditRoom extends Base {
	use Name, IconPreset;
}

class EditRoomMember extends Base {
	use MembersAdminIds, MembersMemberIds, MembersReadonlyIds;
}

class DeleteRoom extends Base {
	use ActionType;
}