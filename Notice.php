<?php
/**	op-core-function:/Notice.php
 *
 * @created    2020-10-07
 * @copied     2025-06-11
 * @license    Apache-2.0
 * @package    op-core
 * @subpackage function
 * @copyright  (C) 2020 Tomoaki Nagahara
 */

/**	namespace
 *
 */
namespace OP;

/**	Notice is error notice.
 *
 * <pre>
 * OP()->Error( $message, debug_backtrace() );
 * </pre>
 *
 * @deprecated 2024-08-26  OP()->Notice()
 * @created    2020-10-07
 * @param      string      $message
 * @param      array       $debug_backtrace
 */
function Notice($message, $debug_backtrace=null)
{
	Error::Set( $message, $debug_backtrace ?? debug_backtrace() );
}
