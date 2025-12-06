<?php
/**	op-core-function:/OP.php
 *
 * @created    2022-10-05
 * @moved      2025-06-13
 * @license    Apache-2.0
 * @package    op-core
 * @subpackage function
 * @copyright  (C) 2022 Tomoaki Nagahara
 */

/**	Return instantiated OP instance.
 *
 * @created    2022-10-05
 * @return     OP\OP
 */
function OP()
{
	//	Instantiated OP instance.
	static $_OP;

	//	OP class is not loaded yet.
	if(!$_OP ){
		//	Instantiate \OP\OP class.
		$_OP = new \OP\OP();
	}

	//	Return instantiated OP instance.
	return $_OP;
}
