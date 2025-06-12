<?php
/**	op-core-function:/GetErrorConstName.php
 *
 * @created    2025-06-11
 * @package    op-core-function
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	Get php core error const name from error number.
 *
 * <pre>
 * $const_name = GetErrorConstName($error_number);
 * </pre>
 *
 * @genesis    ????-??-??  op-core-5:/App->Error()
 * @created    2025-06-11
 * @see        https://www.php.net/manual/ja/errorfunc.constants.php
 * @param      int         error number
 * @return     string      E_NOTICE, E_WARNING...
 */
function GetErrorConstName( int $number ) : string
{
	//	...
	$_names = null;

	//	...
	if( $_names === null ){
		$_names = [
			1     => 'E_ERROR',
			2     => 'E_WARNING',
			4     => 'E_PARSE',
			8     => 'E_NOTICE',
			2048  => 'E_STRICT',
			8192  => 'E_DEPRECATED',
			32767 => 'E_ALL',
		];
	}

	//	...
	return $_names[$number] ?? (string)$number;
}
