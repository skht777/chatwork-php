<?php
namespace Skht777\Util\Func;
trait TimeStamp {
	
	public function timeStamp(\DateTime $dateTime) {
		return $dateTime->getTimestamp();
	}
	
	public function getDateTime($timeStamp) {
		return (new \DateTime())->setTimeStamp($timeStamp);
	}
}