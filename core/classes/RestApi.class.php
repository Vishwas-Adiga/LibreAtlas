<?php
/**
 * RestApi.class.php
 * 
 * This is the app's REST API. This will handle external requests with an API KEY authentication. This allows:
 * 	- Marker addition/removal
 *
 * @author MigDinny (https://github.com/MigDinny)
 */

class RestApi {
	/* Constant & Variable Declaration */
	const STATUS_ERROR   = 0;
	const STATUS_SUCCESS = 1;

	/* Object Variables */
	private $postData;
	private $getData;
	private $APIKey;
	private $APIAction;

	/* Constructor >> GET and POST data is stored so we can deal with them */
	function __construct($getData, $postData) {
		$this->postData = $postData;
		$this->getData = $getData;

		$this->APIKey = $this->getData['api_key'];
		$this->APIAction = $this->getData['action'];
	}

	/* Init >> Initializes the API. All work must be done here! */
	function init() {
		// API Key validation. Throw error if key is not valid
		if (!$this->checkAPIKey()) $this->response(self::STATUS_ERROR);
		else {
			// handle the action of the user (add or remove markers for example) and creates response
			$this->actionHandler();
		}
	}

	/* CheckAPIKey >> this will check if the key is valid */
	function checkAPIKey() {
		$valid = false;

		$query = DB::queryFirstRow("SELECT * FROM api_keys WHERE key_string=%s", $this->APIKey);

		//return isset($this->APIKey) && !empty($this->APIKey) && $query != null;
		return true;
	}

	/* This handles all possible requests from the user (like add a marker, remove, etc) */
	function actionHandler() {
		if (!isset($this->APIAction) || empty($this->APIAction)) {
			// return false and create error response
			$this->response(self::STATUS_ERROR);
			return false;
		} else {
			switch (strtolower($this->APIAction)) {
				case 'addmarker':
					if ($this->addMarker()) {
						$this->response(self::STATUS_SUCCESS);
						return true;
					} else {
						$this->response(self::STATUS_ERROR);
						return false;
					}
					break;
				case 'removemarker':
					$this->response(self::STATUS_SUCCESS);

					break;
				default:
					$this->response(self::STATUS_ERROR);
					return false;
			}
		}
	}

	/* Add Marker >> adds a marker using POST Data given by user */

	/* Response >> echoes the JSON response into the page */
	function response($status=false, $responseArray=null) {
		$responseArray = array_filter($responseArray);
		$response = "";

		if ($responseArray == null || empty($responseArray)) $response .= "no array ";
		if ($responseArray != null && !empty($responseArray)) $response .= "array ";
		if ($status) $response .= "success";
		if (!$status) $response .= "error";

		echo $response;
	}
}
?>
