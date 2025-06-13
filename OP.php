<?php
/**	op-core-function:/OP.php
 *
 * @created    2022-10-05
 * @moved      2025-06-13
 * @version    1.0
 * @package    op-core-function
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
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
