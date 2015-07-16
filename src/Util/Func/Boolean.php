<?php
namespace Skht777\Util\Func;
trait Boolean {

	public function boolean($bool) {
		return boolval($bool) ? 1 : 0;
	}
}