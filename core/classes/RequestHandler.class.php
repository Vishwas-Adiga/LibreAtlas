<?php
/**
 * RequestHandler.class.php
 * 
 * This class will handle requests.
 * When getting into index.php (for example), this handler decides if the request is default or other kind of request (ie. REST Api)
 *
 * @author MigDinny (https://github.com/MigDinny)
 */

class RequestHandler {

	// Static Constants
	const INDEX = 0;

	// Object variables
	private $postData;
	private $getData;
	private $handlerPage;

	// Constructor, ex >> new RequestHandler(RequestHandler::INDEX, $_GET, $_POST);
	function __construct($handlerPage, $getData, $postData) {
		$this->handlerPage = $handlerPage;
		$this->getData = $getData;
		$this->postData = $postData;
	}

	// Start >> starts the handler. Identifies the page which is being worked on and executes the required conditionals
	function start() {
		switch ($this->handlerPage) {
			case self::INDEX:
				include $GLOBALS['contents'] . '/map/map.php';
				break;
			default:
				//include $GLOBALS['contents'] . '/map.php';
				break;
		}
	}
}

?>
