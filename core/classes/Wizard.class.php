<?php
/**
 * Wizard.class.php
 * 
 * This is the app's wizard. He does everything, you just need to say the spell. This wizard static class contains a lot of useful tools like:
 * 	- Libraries Inclusion
 *	- Some pattern definition (like website title)
 *
 * @author MigDinny (https://github.com/MigDinny)
 */

class Wizard {
	/* Constant Declaration */
	const LIBRARY_JQUERY = 0;


	/* Returns App Title */
	public static function getAppTitle() {
		return $GLOBALS['appname'];
	}

	/* Returns Maps API Key */
	public static function getMapsAPIKey() {
		return $GLOBALS['maps_api_key'];
	}

	/* Includes libraries */
	public static function callAssets($assetArray) {
		foreach ($assetArray as $asset) {
			switch ($asset) {
				case self::LIBRARY_JQUERY:
					return '<script></script>';
					break;
				default:
					break;
			}
		}
	}
}
?>
