<?php
namespace Skht777\Chatwork\Response;
class ContactsGET extends Base {
	use AccountId, RoomId, Name, ChatworkId, OrganizationId, OrganizationName,
	Department, AvatarImageUrl;
}