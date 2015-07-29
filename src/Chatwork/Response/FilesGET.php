<?php
namespace Skht777\Chatwork\Response;
class FilesGET extends Base {
	use ListIterator;
	
	protected function getObject(array $array) {
		return new FilesIdGETRaw($array);
	}
}

class FilesIdGETRaw extends Base {
	use FileId, Account, MessageId, Filename, Filesize, UploadTime;
}