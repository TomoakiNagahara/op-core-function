<?php
/**	op-core-function:/Decode.php
 *
 * @created    2025-06-16
 * @license    Apache-2.0
 * @package    op-core
 * @subpackage function
 * @copyright  (C) 2012 Tomoaki Nagahara
 */

/**	namespace
 *
 */
namespace OP;

/**	Decode can decode nested array transparent.
 *
 * @param  mixed  $value
 * @param  string $charset
 * @return string $var
 */
function Decode($value, $charset='utf-8')
{
	//	...
	switch( gettype($value) ){
		//	...
		case 'string':
			$value = html_entity_decode($value, ENT_QUOTES, $charset);
			break;

		//	...
		case 'array':
			$result = [];
			foreach( $value as $key => $val ){
				$key = is_string($key) ? Decode($key, $charset): $key;
				$val = Decode($val, $charset);
				$result[$key] = $val;
			}
			$value = $result;
			break;

		//	...
		default:
	}

	//	...
	return $value;
}
