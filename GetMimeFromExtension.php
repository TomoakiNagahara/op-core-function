<?php
/**	op-core-function:/GetMimeFromExtension.php
 *
 * @created    2020-08-10
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	namespace
 *
 */
namespace OP;

/**	Get MIME from extension.
 *
 * @created    2020-08-10
 * @version    1.0
 * @package    op-core
 * @subpackage function
 * @param  string $extension
 * @return string $mime
 */
function GetMimeFromExtension(string $ext):string
{
	//	...
	$ext = strtolower($ext);

	//	...
	switch( $ext ){
		case 'js':
			$mime = 'text/javascript';
			break;
		case 'css':
			$mime = 'text/css';
			break;
		case 'txt':
			$mime = 'text/plain';
			break;
		case 'php':
		case 'html':
			$mime = 'text/html';
			break;
		//	images
		case 'jpg':
			$ext = 'jpeg';
		case 'gif':
		case 'png':
		case 'jpeg':
			$mime = "image/{$ext}";
			break;
		case 'ico':
			$mime = "image/vnd.microsoft.icon";
			break;
		default:
			$mime = '';
	};

	//	...
	return $mime;
}
