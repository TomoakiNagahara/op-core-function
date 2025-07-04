<?php
/**	op-core-function:/GetExtension.php
 *
 * @created    2020-05-08
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	namespace
 *
 */
namespace OP;

/**	Get extension.
 *
 * @created    2020-05-08
 * @version    1.0
 * @package    op-core
 * @subpackage function
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
