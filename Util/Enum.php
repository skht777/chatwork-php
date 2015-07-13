<?php
namespace skht777\Util;
class Enum {
	private $_value;
	
	private function __construct($value) {
		$this->_value = $value;
	}
	
	public final static function __callStatic($label, $args) {
		$class = get_called_class();
		$const = constant("$class::$label");
		return new $class($const);
	}
	
	public function value() {
		return $this->_value;
		
	}
	
	function equals($value) {
		$this->_value === $value;
	}
	
	function __toString() {
		return $value;
	}
}
