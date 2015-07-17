<?php
namespace Skht777\Chatwork\Response;
class FilesIdGet extends Base {
	use FileId, Account, MessageId, Filename, Filesize, UploadTime, DownloadUrl;
}