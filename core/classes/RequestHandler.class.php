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
	const INDEX = 0; // where handler is called

	const MAP_AREA = 'map';
	const DASHBOARD_AREA = 'dashboard';
	const API_AREA = 'api';
	const LOGIN_AREA = 'login';

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
	 *
	 * ?area=dashboard
	 * 		?action=login
	 *			includes login page for dashboard
	 *		<default behavior>
	 *			includes dashboard page
	 *
	 * ?area=api
	 *		includes api
	 *
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
						case self::MAP_AREA:
							include $GLOBALS['contents'] . '/map/map.php';
							break;

						case self::API_AREA:
							include $GLOBALS['contents'] . '/rest-api/api.php';
							break;

						case self::DASHBOARD_AREA:
							if (isset($this->getData['action'])) {
								switch ($this->getData['action']) {
									case self::LOGIN_AREA:
										include $GLOBALS['contents'] . '/dashboard/login.php';
										break;

									default:
										include $GLOBALS['contents'] . '/dashboard/dashboard.php';
										break;
								}
							} else {
								include $GLOBALS['contents'] . '/dashboard/dashboard.php';
							}
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
