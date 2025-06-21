<?php
/**	op-core-function:/RootPath.php
 *
 * @created    2020-05-23
 * @version    1.0
 * @package    op-core-function
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	namespace
 *
 */
namespace OP;

/**	Can register meta root path.
 *
 * @deprecated 2025-06-18
 * @param string $meta
 * @param string $path
 */
function RootPath(string $meta='', string $path='', bool $check_directory_exists=true)
{
	//	Stack root list.
	static $root;

	//	Remove meta flag.
	if( $meta ){
		$meta = rtrim($meta, ':/');
	}

	//	Register root path.
	if( $meta and $path ){

		//	Check if exists.
		if( $root[$meta] ?? null ){
			throw new \Exception("This meta path already set. ($meta, $path)");
		}

		//	Deny upper directory specify.
		if( strpos($path, '../') !== false ){
			throw new \Exception("Deny upper directory specify.");
		}

		//	Check directory exists.
		if($check_directory_exists and !is_dir($path) ){
			throw new \Exception("This directory not exists. ($path)");
		}

		//	Replace duplicate slash.
		$path = preg_replace('|//|', '/', $path);

		//	Add slash to head and tail.
		$path = '/'.trim($path, '/').'/';

		//	Register.
		$root[$meta] = $path;
	};

	//	Return meta root path.
	if( $meta ){
		return $root[$meta] ?? false;
	};

	//	Return root list.
	return $root;
}
