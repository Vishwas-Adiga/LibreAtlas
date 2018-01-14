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

	// Init >> Initializes the handler. Identifies the page which is being worked on and executes the required conditionals
	/*
	 * ?area=map
	 * 		includes map
	 * ?area=dashboard
	 * 		includes dashboard
	 * ?area=api
	 *		includes api
	 * ?area=*
	 *		includes map
	 * 
	 * <default behavior>
	 * 		includes map
	 */
	function init() {
		switch ($this->handlerPage) {
			case self::INDEX:
				if (isset($this->getData['area'])) {
					switch ($this->getData['area']) {
						case 'map':
							include $GLOBALS['contents'] . '/map/map.php';
							break;
						case 'api':
							include $GLOBALS['contents'] . '/rest-api/api.php';
							break;
						case 'dashboard':
							include $GLOBALS['contents'] . '/dashboard/dashboard.php';
							break;
						default:
							include $GLOBALS['contents'] . '/map/map.php';
							break;
					}
				} else {
					include $GLOBALS['contents'] . '/map/map.php';
				}
				break;
			default:
				include $GLOBALS['contents'] . '/map/map.php';
				break;
		}
	}
}

?>
