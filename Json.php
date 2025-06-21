<?php
/**	op-core-function:/Json.php
 *
 * @moved      2025-06-16
 * @version    1.0
 * @package    op-core-function
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
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
