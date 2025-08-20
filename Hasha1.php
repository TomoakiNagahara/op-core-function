<?php
/**	op-core-function:/Hasha1.php
 *
 * @moved      2025-08-20  from op-core:/Functions.php
 * @version    1.0
 * @package    op-core-function
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	namespace
 *
 */
namespace OP;

/**	To hash
 *
 * This function is convert to fixed length unique string from long or short strings.
 *
 * @param   mixed    $var
 * @param   integer  $length
 * @param   string   $salt
 * @return  string   $hash
 */
function Hasha1($var, $length=12, $salt=null)
{
	//	Can overwrite salt.
	if( $salt === null ){
		$salt = Env::AppID();
	};

	//	To json.
	$var = json_encode($var);

	//	...
	return substr(sha1($var . $salt), 0, $length);
}
