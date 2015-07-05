<?php
include_once dirname(__FILE__).'/Enum.php';
final class RequestMethod extends Enum {
	const GET = "GET";
	const POST = 'POST';
	const PUT = 'PUT';
	const DELETE = 'DELETE';
}