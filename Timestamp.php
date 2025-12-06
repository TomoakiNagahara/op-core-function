<?php
/**	op-core-function:/Timestamp.php
 *
 * @created    2023-03-29
 * @license    Apache-2.0
 * @package    op-core
 * @subpackage function
 * @copyright  (C) 2023 Tomoaki Nagahara
 */

/**	Declare strict
 *
 */
declare(strict_types=1);

/**	namespace
 *
 */
namespace OP;

/**	Get local timezone timestamp.
 *
 * <pre>
 * // Local time timestamp
 * $local_timestamp = \OP\Timestamp();
 *
 * // UTC time timestamp
 * $utc       = \OP\Timestamp(true);
 *
 * // 1 month ago timestamp
 * $offset    = \OP\Timestamp(false, '-1 month');
 * </pre>
 *
 * @created  2019-09-24
 * @moved    2023-03-29  OP\Env::Timestamp()
 * @param    boolean     $utc
 * @param    string      $offset
 * @return   string      $timestamp
 */
function Timestamp(?bool $utc=false, $offset=null):string
{
	//	...
	require_once(__DIR__.'/Time.php');

	//	...
	$time = Time($utc);

	//	...
	if( $offset ){
		$time = strtotime($offset, $time);
	}

	//	...
	return date(_OP_DATE_TIME_, $time);
}
