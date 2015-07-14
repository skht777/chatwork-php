<?php
namespace Skht777\Chatwork\Parameter;
use Skht777\Chatwork\Parameter\Base;
use Skht777\Chatwork\Parameter as Param;
class File extends Base {
	
	public static function get() {
		return GetFile::make();
	}
	
	public static function getInfo() {
		return GetFileInformation::make();
	}
}

class GetFileInformation extends Base {
	use  Param\CreateDownloadUrl;
}

class GetFile extends Base {
	use Param\AccountId;
}