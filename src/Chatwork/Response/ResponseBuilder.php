<?php
namespace Skht777\Chatwork\Response;
use Skht777\Util\RequestMethod as Method;
class ResponseBuilder extends Base {
	
	public static function getInstance($fullpath, Method $method, $response) {
		if($method->equals(Method::DELETE)) return true;
		$endpoint = explode('/', preg_replace("/[0-9]+/", "Id", rtrim($fullpath, '/')));
		if(count($endpoint) - 2 >= 0 && end($endpoint) === 'Id') {
			$path = mb_convert_case($endpoint[count($endpoint) -2], MB_CASE_TITLE).end($endpoint);
		} else $path = mb_convert_case(end($endpoint), MB_CASE_TITLE);
		$class = __NAMESPACE__.'\\'.$path.$method->value();
		return new $class($response);
	}
}