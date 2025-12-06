<?php
/**	op-core-function:/GetExtension.php
 *
 * @created    2020-05-08
 * @license    Apache-2.0
 * @package    op-core
 * @subpackage function
 * @copyright  (C) 2020 Tomoaki Nagahara
 */

/**	namespace
 *
 */
namespace OP;

/**	Get extension.
 *
 * @param  string $file
 * @return string $extension
 */
function GetExtension(string $file):string
{
	//	...
	if( $pos  = strpos($file, '?') ){
		$file = substr($file, 0, $pos);
	}

	//	...
	if(!$pos = strrpos($file, '.') ){
		return false;
	}

	//	...
	return substr($file, $pos+1);
}
