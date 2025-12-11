<?php
/**	op-core-function:/Time.php
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

/**	Get frozen unix time.
 *
 * @created  ????-??-??
 * @moved    2023-03-29  OP\Env::Time()
 * @param    string      $time
 * @param    boolean     $utc
 * @return   integer     $time
 */
function Time( ?string $time=null, ?bool $utc=false ) : int
{
	//	...
	static $_time;

	//	Change to time of the NEW WORLD.
	if( $time ){
		//	...
		if( isset($_time) ){
			Error::Set("Frozen time has already set.");
		}else{

		//	...
		$_time = strtotime($time);

		//	...
		if(!$utc ){
			//	Add timezone offset at php.ini timezone.
			$_time -= date('Z');
		}
		}
	};

	//	Frozen current time.
	if( empty($_time) ){
		//	Always UTC.
		$_time = \time() - date('Z');
	};

	//	...
	return $utc ? $_time : $_time + date('Z');
}
