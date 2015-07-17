<?php
namespace Skht777\Chatwork\Response;
class MeGET extends Base {
	use AccountId, RoomId, Name, ChatworkId, OrganizationId, OrganizationName,
	Department, Title, Url, Introduction, Mail, TelOrganization, TelExtension, TelMobile,
	Skype, Facebook, Twitter, AvatarImageUrl;
}