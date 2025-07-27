<?php
/**	op-core-function:/Mail.php
 *
 * @created    2025-07-27
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	namespace
 *
 */
namespace OP;

/**	Mail is simple mail function.
 *
 * <pre>
 * //	Plain text mail
 * OP()->Mail('addr@example.com', 'TEST', 'This is just test mail.');
 *
 * //	HTML mail
 * OP()->Mail('addr@example.com', 'HTML mail', '<h1>HTML</h1><p>This is HTML format mail.</p>', ['mime'=>'text/html']);
 * </pre>
 *
 * @created    2025-07-27
 * @param      string  $to       Destination email address.
 * @param      string  $subject  Subject line of the email.
 * @param      string  $message  Body content of the email.
 * @param      array   $headers  Optional headers (from, reply, mime, charset, cc, bcc).
 * @return     bool              Returns true if mail was accepted for delivery, false otherwise.
 */
function Mail( string $to, string $subject, string $message, array $headers=[] ) : bool
{
	/* @var $cc  string */
	/* @var $bcc string */
	$from    = $headers['from']    ?? Config::Get('admin')[OP::_ADMIN_FROM_] ?? 'root';
	$reply   = $headers['reply']   ?? $from;
	$mime    = $headers['mime']    ?? 'text/plain';
	$charset = $headers['charset'] ?? 'UTF-8';
	$cc      = $headers['cc']      ??  null;
	$bcc     = $headers['bcc']     ??  null;

	//	...
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: {$mime}; charset={$charset}\r\n";
	$headers .= "From: {$from}\r\n";
	$headers .= "Reply-To: {$reply}\r\n";

	//	...
	foreach( ['Cc'=>$cc, 'Bcc'=>$bcc] as $label => $value ){
		switch( gettype($value) ){
			case 'string':
				$addr = $value;
				break;
			case 'array':
				$addr = join(',', $value);
				break;
			default:
				D( gettype($value) );
				continue 2;
		}
		$headers .= "{$label}: {$addr}\r\n";
	}

	//	...
	return \mail($to, $subject, $message, $headers);
}
