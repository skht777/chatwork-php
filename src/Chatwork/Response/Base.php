<?php
namespace Skht777\Chatwork\Response;
use Skht777\Util\Func\KeyValue;
use Skht777\Util\Func\TimeStamp;
trait AccountId {

	public function getAccountId() {
		return $this->getByKey("account_id");
	}
}

trait Admin {

	public function getAdmin() {
		return $this->getByKey("admin");
	}
}

trait AvatarImageUrl {

	public function getAvatarImageUrl() {
		return $this->getByKey("avatar_image_url");
	}
}

trait Body {

	public function getBody() {
		return $this->getByKey("body");
	}
}

trait ChatworkId {

	public function getChatworkId() {
		return $this->getByKey("chatwork_id");
	}
}

trait Department {

	public function getDepartment() {
		return $this->getByKey("department");
	}
}

trait Description {

	public function getDescription() {
		return $this->getByKey("description");
	}
}

trait DownloadUrl {

	public function getdDownloadUrl() {
		return $this->getByKey("download_url");
	}
}

trait Facebook {

	public function getFacebook() {
		return $this->getByKey("facebook");
	}
}

trait FileId {

	public function getFileId() {
		return $this->getByKey("file_id");
	}
}

trait FileNum {

	public function getFileNum() {
		return $this->getByKey("file_num");
	}
}

trait Filename {

	public function getFilename() {
		return $this->getByKey("filename");
	}
}

trait Filesize {

	public function getFilesize() {
		return $this->getByKey("filesize");
	}
}

trait IconPath {

	public function getIconPath() {
		return $this->getByKey("icon_path");
	}
}

trait Introduction {

	public function getIntroduction() {
		return $this->getByKey("introduction");
	}
}

trait LastUpdateTime {

	public function getLastUpdateTime() {
		return $this->getDateTime($this->getByKey("last_update_time"));
	}
}

trait LimitTime {

	public function getLimitTime() {
		return $this->getDateTime($this->getByKey("limit_time"));
	}
}

trait Mail {

	public function getMail() {
		return $this->getByKey("mail");
	}
}

trait Member {

	public function getMember() {
		return $this->getByKey("member");
	}
}

trait MentionNum {

	public function getMentionNum() {
		return $this->getByKey("mention_num");
	}
}

trait MentionRoomNum {

	public function getMentionRoomNum() {
		return $this->getByKey("mention_room_num");
	}
}

trait MessageId {

	public function getMessageId() {
		return $this->getByKey("message_id");
	}
}

trait MessageNum {

	public function getMessageNum() {
		return $this->getByKey("message_num");
	}
}

trait MytaskNum {

	public function getMytaskNum() {
		return $this->getByKey("mytask_num");
	}
}

trait MytaskRoomNum {

	public function getMytaskRoomNum() {
		return $this->getByKey("mytask_room_num");
	}
}

trait Name {

	public function getName() {
		return $this->getByKey("name");
	}
}

trait OrganizationId {

	public function getOrganizationId() {
		return $this->getByKey("organization_id");
	}
}

trait OrganizationName {

	public function getOrganizationName() {
		return $this->getByKey("organization_name");
	}
}

trait Readonly {

	public function getReadonly() {
		return $this->getByKey("readonly");
	}
}

trait Role {

	public function getRole() {
		return $this->getByKey("role");
	}
}

trait RoomId {

	public function getRoomId() {
		return $this->getByKey("room_id");
	}
}

trait SendTime {

	public function getSendTime() {
		return $this->getDateTime($this->getByKey("send_time"));
	}
}

trait Skype {

	public function getSkype() {
		return $this->getByKey("skype");
	}
}

trait Status {

	public function getStatus() {
		return $this->getByKey("status");
	}
}

trait Sticky {

	public function getSticky() {
		return $this->getByKey("sticky");
	}
}

trait TaskId {

	public function getTaskId() {
		return $this->getByKey("task_id");
	}
}

trait TaskIds {

	public function getTaskIds() {
		return $this->getByKey("task_ids");
	}
}

trait TaskNum {

	public function getTaskNum() {
		return $this->getByKey("task_num");
	}
}

trait TelExtension {

	public function getTelExtension() {
		return $this->getByKey("tel_extension");
	}
}

trait TelMobile {

	public function getTelMobile() {
		return $this->getByKey("tel_mobile");
	}
}

trait TelOrganization {

	public function getTelOrganization() {
		return $this->getByKey("tel_organization");
	}
}

trait Title {

	public function getTitle() {
		return $this->getByKey("title");
	}
}

trait Twitter {

	public function getTwitter() {
		return $this->getByKey("twitter");
	}
}

trait Type {

	public function getType() {
		return $this->getByKey("type");
	}
}

trait UnreadNum {

	public function getUnreadNum() {
		return $this->getByKey("unread_num");
	}
}

trait UnreadRoomNum {
	
	public function getUnreadRoomNum() {
		return $this->getByKey("unread_room_num");
	}
}

trait UpdateTime {
	
	public function getUpdateTime() {
		return $this->getDateTime($this->getByKey("update_time"));
	}
}

trait UploadTime {
	
	public function getUploadTime() {
		return $this->getDateTime($this->getByKey("upload_time"));
	}
}

trait Url {
	
	public function geturl() {
		return $this->getByKey("url");
	}
}

trait Account {
	
	public function getAccount() {
		return new UserMinimal($this->getByKey("account"));
	}
}

trait AssignedByAccount {
	
	public function getAssignedByAccount() {
		return new UserMinimal($this->getByKey("assigned_by_account"));
	}
}

trait Room {
	
	public function getRoom() {
		return new RoomMinimal($this->getByKey("room"));
	}
}

trait ListIterator {

	public function getLength() {
		return count($this->getValue());
	}

	public function getElement($n) {
		return $this->getObject($this->getByKey(intval($n)));
	}
	
	protected abstract function getObject(array $array);
}

class Base {
	use KeyValue, TimeStamp {
		setKeyValue as private;
		getByKey as protected;
		timeStamp as private;
		getDateTime as protected;
		getValue as getResponseMap;
	}
	
	protected function __construct(array $response) {
		$this->_param = $response;
	}
}

class UserMinimal extends Base {
	use AccountId, Name, AvatarImageUrl;
}

class RoomMinimal extends Base {
	use RoomId, Name, IconPath;
}