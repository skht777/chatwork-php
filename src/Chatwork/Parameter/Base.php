<?php
namespace Skht777\Chatwork\Parameter;
use Skht777\Util\Func;
trait AccountId {
	
	public function setAccountId($id) {
		$this->setKeyValue('account_id', intval($id));
		return $this;
	}
}

trait AssignedByAccountId {
	
	public function setAssignedBy($id) {
		$this->setKeyValue('assigned_by_account_id', intval($id));
		return $this;
	}
}

trait Status {
	
	public function setStatus(Enum\StatusEnum $status) {
		$this->setKeyValue('status', $this->enum($status));
		return $this;
	}
}

trait Description {
	
	public function setDescription($description) {
		$this->setKeyValue('description', strval($description));
		return $this;
	}
}

trait IconPreset {
	
	public function setIconPreset(Enum\IconEnum $iconPreset) {
		$this->setKeyValue('icon_preset', $this->enum($iconPreset));
		return $this;
	}
}

trait Name {
	
	public function setName($name) {
		$this->setKeyValue('name', strval($name));
		return $this;
	}
}

trait MembersAdminIds {
	
	public function setAdmin(... $ids) {
		$this->setKeyValue('members_admin_ids', $this->intList($ids));
		return $this;
	}
}

trait MembersMemberIds {
	
	public function setNormal(... $ids) {
		$this->setKeyValue('members_member_ids', $this->intList($ids));
		return $this;
	}
}

trait MembersReadonlyIds {
	
	public function setReadonly(... $ids) {
		$this->setKeyValue('members_readonly_ids', $this->intList($ids));
		return $this;
	}
}

trait ActionType {
	
	public function setActionType(Enum\ActionEnum $action) {
		$this->setKeyValue('action_type', $this->enum($action));
		return $this;
	}
}

trait Force {
	use Func\Boolean;
	
	public function setForce($isForce) {
		$this->setKeyValue('force', $this->boolean($isForce));
		return $this;
	}
}

trait Body {

	public function setBody($body) {
		$this->setKeyValue('body', strval($body));
		return $this;
	}
}

trait Limit {
	
	public function setLimit(\DateTime $limit) {
		$this->setKeyValue('limit', $this->timeStamp($limit));
		return $this;
	}
}

trait ToIds {
	
	public function setInCharge(... $ids) {
		$this->setKeyValue('to_ids', $this->intList($ids));
		return $this;
	}
}

trait CreateDownloadUrl {

	public function setDownloadable($isDownload) {
		$this->setKeyValue('create_download_url', $this->boolean($isDownload));
		return $this;
	}
}

class Base {
	use Func\KeyValue, Func\Enum, Func\IntList, Func\Boolean, Func\TimeStamp {
		setKeyValue as protected;
		enum as protected;
		intList as protected;
		boolean as protected;
		timeStamp as protected;
	}
	
	protected function __construct(){}
	
	protected static function make() {
		return new static;
	}
}