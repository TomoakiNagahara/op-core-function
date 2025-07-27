<?php
/**	op-core:/function/ConvertPath.php
 *
 * @genesis    ????-??-??  op-core-5:/OnePiece.class.php
 * @created    2020-05-10
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	Declare strict
 *
 */
declare(strict_types=1);

/**	namespace
 *
 */
namespace OP;

/**	Convert to local file path from meta path.
 *
 * <pre>
 * ConvertPath('app:/index.php'); -> /www/localhost/index.php
 * </pre>
 *
 * @param  string $meta_path
 * @param  bool   $throw_exception
 * @param  bool   $file_exists
 * @return string
 */
function ConvertPath(string $path, bool $throw_exception=true, $file_exists=true):string
{
	//	Trim
	$path = trim($path);

	//	URL Query
	if( $pos   = strpos($path, '?') ){
		$query = substr($path, $pos);
		$path  = substr($path, 0, $pos);
	}

	//	Root path
	if( $path[0] === '/' ){
		$error = "This path is not meta path. A path from \"/\" can not be specified. ({$path})";
		if( $throw_exception ){
			throw new \Exception($error);
		}else{
			OP::Error($error);
			return '';
		}
	}

	//	Parent path.
	if( strpos($path, '..') !== false ){
		$error = "Upper directory cannot be specified. ($path)";
		if( $throw_exception ){
			throw new \Exception($error);
		}else{
			OP::Error($error);
			return '';
		}
	}

	//	Check meta label
	if( $pos = strpos($path, ':/') ){
		//	Get meta label.
		$meta = substr($path, 0, $pos);

		//	Check exists meta label.
		if(!$root = RootPath($meta) ){
			$error = "This meta label is not exists. ($path)";
			if( $throw_exception ){
				throw new \Exception($error);
			}else{
				OP::Error($error);
				return '';
			}
		};

		//	...
		$path = $root . substr($path, $pos+2);

		//	Check if directory
		if( is_dir($path) ){
			//	Added slash to tail.
			$path = rtrim($path, '/') . '/';
		}

	}else{
		/*
		//	Add current directory.
		$path = getcwd() . '/' . $path;
		*/
		$error = "Meta label not found. ({$path})";
		if( $throw_exception ){
			throw new \Exception($error);
		}else{
			OP::Error($error);
			return '';
		}
	};

	// Check if file exists.
	if( $file_exists and !file_exists($path) ){
		//	...
		if( $throw_exception === false ){
			//	Return false.
			$path = false;
		}else{
			throw new \Exception("This file does not exist. ($path)");
		}
	}

	//	Return calculated value.
	return $path . ($query ?? null);
}
