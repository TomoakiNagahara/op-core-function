<?php
/**	op-core-function:/Layout.php
 *
 * @created    2021-01-10
 * @license    Apache-2.0
 * @package    op-core
 * @subpackage function
 * @copyright  (C) 2021 Tomoaki Nagahara
 */

/**	namespace
 *
 */
namespace OP;

/**	Get/Set Layout config value.
 *
 * @deprecated 2025-05-19
 * @created    2021-01-10
 * @param      null|boolean|string $value  is execute flag or layout name.
 * @return     boolean|string      $result is execute flag or layout name.
 */
function Layout($value=null){
	//	...
	if( $value !== null ){
		//	...
		if( is_string($value) ){
			//	...
			Config::Set('layout',['name'=>$value]);
			$value = true;
		}

		//	...
		if( is_bool($value) ){
			//	...
			Config::Set('layout',['execute'=>$value]);
		}
	}

	//	...
	$config = Config::Get('layout');

	//	...
	return $config['execute'] ? $config['name'] : false;
}
