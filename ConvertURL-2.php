<?php
/**	op-core-function:/ConvertURL-2.php
 *
 * @genesis    ????-??-??  op-core-5:/OnePiece.class.php
 * @created    2020-03-08
 * @version    1.0
 * @package    op-core-function
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

/**	Convert to Document root URL from meta path or full path.
 *
 * This function is for abstract whatever path the application on placed.
 *
 * Example:
 * Document root    --> /var/www/html
 * Application root --> /var/www/html/onepiece-app/
 *
 * ConvertURL('doc:/index.html'); --> /index.html
 * ConvertURL('app:/index.php');  --> /onepiece-app/index.php
 *
 * @created   2020-03-08
 * @param     string       $path
 * @return    string       $document_root_url
 */
function ConvertURL( string $path )
{
	//	...
	$url = $path;

	//	Check if full path.
	if( $url[0] === '/' and $url[1] !== '/' ){
		/*
		//	Calc document root.
		foreach(['doc','real'] as $key){
			//	...
			$doc_root = RootPath()[$key] ?? null;

			//	Check if document root.
			if( $doc_root and 0 === strpos($url, $doc_root) ){
				//	Return compressed document root path.
				return substr($url, strlen($doc_root));
			}
		}
		*/

		//	...
		if( strpos($path, _ROOT_ASSET_) === 0 ){
			OP::Notice("This path is the asset root path: {$path}");
			return;
		}

		//	...
		if( strpos(_ROOT_APP_, _ROOT_DOC_) === 0 ){
			//	...
			if( strpos($path, ltrim(_ROOT_APP_,'/')) === 0 ){
				//	...
				$len = strlen( ltrim(_ROOT_APP_,'/') );
				$url = 'app:/' . substr($path, $len);
			}else if( strpos($path, realpath(_ROOT_APP_)) === 0 ){
				//	...
				$len = strlen( realpath(_ROOT_APP_) );
				$url = 'app:/' . ltrim( substr($path, $len), '/');
			}else{
			//	...
			$doc_root = _ROOT_DOC_;
			OP::Error("This full path is not document root path: doc={$doc_root}, path={$path}");
			return false;
			}
		}
	}

	//	Separate URL Query.
	if( $pos = strpos($url, '?') ){
		$que = substr($url, $pos);
		$url = substr($url, 0, $pos);
	};

	//	In case of current URL.
	if( $url === '.' ){
		//	...
		$scheme = $_SERVER['REQUEST_SCHEME'];

		//	...
		$host = $_SERVER['HTTP_HOST'];

		//	...
		$uri = $_SERVER['REQUEST_URI'];

		//	...
		return "{$scheme}://{$host}{$uri}";
	};

	//	Convert to full path.
	if(!$full_path = ConvertPath($url, false, false) ){
		OP::Notice("ConvertPath() is return false.");
		return;
	}

	//	Check if asset path.
	if( strpos($full_path, RootPath('asset')) === 0 ){
		OP::Notice("This path is the asset root path: {$url}");
		return;
	}

	//	Document root.
	$doc_root = rtrim($_SERVER['DOCUMENT_ROOT'], '/');

	//	Check whether document root path.
	if( strpos($full_path, $doc_root) !== 0 ){
		OP::Notice("This path is not the document root path. (doc={$doc_root}, full={$full_path})");
		return false;
	};

	//	Generate document root path.
	$url = substr($full_path, strlen($doc_root));

	//	Add slash if directory.
	if( is_dir($full_path) ){
		//	Check if already added slash.
		if( $url[strlen($url)-1] !== '/' ){
			$url = rtrim($url, '/') . '/';
		};
	};

	//	Check if had URL Query.
	if( isset($que) ){
		$url .= $que;
	};

	//	Remove document root path.
	return $url;
}
