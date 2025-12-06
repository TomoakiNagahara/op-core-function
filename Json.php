<?php
/**	op-core-function:/Json.php
 *
 * @moved      2016-06-16
 * @license    Apache-2.0
 * @package    op-core
 * @subpackage function
 * @copyright  (C) 2016 Tomoaki Nagahara
 */

/**	namespace
 *
 */
namespace OP;

/**	Output secure JSON.
 *
 * @param	 array	 $json
 * @param	 string	 $attr
 */
function Json($json, $attr=null)
{
	//	HTML Decode
	/* Decode is convert to &amp; --> &
	$json = Decode($json);
	*/

	//	Convert to json.
	$json = json_encode($json);

	//	Encode XSS. (Not escape quote)
	$json = htmlentities($json, ENT_NOQUOTES, 'utf-8');

	//	...
	require_once(__DIR__.'/Html.php');
	Html($json, 'div.'.$attr, false);
}
