<?php
namespace Skht777\Util\Func;
use Skht777\Util\Enumerable;
trait Enum {

	public function enum(Enumerable $param) {
		return $param->value();
	}
}