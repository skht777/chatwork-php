<?php
namespace Skht777\Util\Func;
trait KeyValue {

	private $_param = array();

	public function setKeyValue($key, $value) {
		$this->_param[$key] = $value;
	}

	public function getValue() {
		return $this->_param;
	}
}