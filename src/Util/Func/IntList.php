<?php
namespace Skht777\Util\Func;
trait IntList {

	public function intList(array $list) {
		$intList = array();
		foreach($list as $int) $intList[] = intval($int);
		return implode(",", $intList);
	}
}