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
	/* Started with:
	 * 1 -> library
	 * 2 -> any kind of style
	 * (preferred order: | 28, 29, 210, 211, 212 | so the first digit indicates the kind of inclusion)
	 */

	const LIBRARY_JQUERY = 10;
	const DARK_MAP_STYLE = 20;

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
		$returnAssetString = "";

		foreach ($assetArray as $asset) {
			switch ($asset) {
				case self::LIBRARY_JQUERY:
					$returnAssetString .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
					break;
				case self::DARK_MAP_STYLE:
					$returnAssetString .= '<script src="' . $GLOBALS['client_contents'] . '/map/darkMapStyle.js' . '"></script>';
					break;
				default:
					break;
			}
		}

		return $returnAssetString;
	}
}
?>
