<?php
namespace Skht777\Chatwork\Response;
class MembersGET extends Base {
	use ListIterator;
	
	protected function getObject(array $array) {
		return new MembersIdGet($array);
	}
}

class MembersIdGet extends Base {
	use AccountId, Role, Name, ChatworkId, OrganizationId,
	OrganizationName, Department, AvatarImageUrl;
}