<?php
/**	op-core-function:/Attribute.php
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

/**	Parse html tag attribute from string to array.
 *
 * @param  string $attr
 * @return array  $result
 */
function Attribute( ?string $attr='' ) : array
{
	//	...
	if( empty($attr) ){
		return [];
	}

	//	...
	$key = 'tag';
	$result = null;

	//	...
	for($i=0, $len=strlen($attr); $i<$len; $i++){
		//	...
		switch( $attr[$i] ){
			case '.':
				$key = 'class';
				if(!empty($result[$key]) ){
					$result[$key] .= ' ';
				}
				continue 2;

			case '#':
				$key = 'id';
				continue 2;

			case '?':
				if( $result['tag'] === 'a' ){
					$key = 'href';
				}
				break;

			case ' ':
				continue 2;

			default:
		}

		//	...
		if( empty($result[$key]) ){
			$result[$key] = '';
		}

		//	...
		$result[$key] .= $attr[$i];
	}

	//	...
	require_once(__DIR__.'/Encode.php');
	return Encode($result);
}
