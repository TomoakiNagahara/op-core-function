<?php
/**	op-core-function:/D.php
 *
 * The "D" is a being that transcends namespaces.
 * You just call "D".
 *
 * @genesis    2004  dump.inc.php
 * @porting    2011  op-core-4:/OnePiece::Dump()
 * @separate   2012  op-core-4:/Dump.class.php
 * @rebirthd   2016  Separate to D() and op-unit-dump
 * @separate   2019-02-21  op-core-5:/functions.php --> op-core-5:/function/D.php
 * @moved      2025-06-14  op-core-function:/D.php
 * @version    1.0
 * @package    op-core-function
 * @author     Tomoaki Nagahara
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/**	Dump values for debugging, visible only to administrators.
 *
 * Simply call "D()" to dump values for debugging purposes.
 *
 * <pre>
 * D( $_SESSION );
 * </pre>
 *
 * @genesis    ????-??-??  by op-core-4:/$op->Dump()
 * @porting    2025-06-14  at op-core-function:/D()
 */
function D()
{
	//	Skip execution if the user is not an administrator.
	if(!OP\OP::isAdmin() ){
		return;
	};

	//	Try loading the Dump unit.
	if(!OP\Unit::Load('Dump') ){

		/* Q: Why is this necessary?
		 * A: If `Unit::Load()` fails, Error is raised. Use `Unit::isInstalled()`;
		//	Throw away last time Notice.
		OP\Error::Pop();
		*/

		//	If the Dump unit class exists, perform a dump using it.
		if( class_exists('OP\UNIT\Dump') ){

			//	Call the Mark method to dump the passed arguments.
			'OP\UNIT\Dump'::Mark( func_get_args() );

			//	Stop further execution.
			return;
		};
	};

	//	Fallback to native var_dump(), if Dump unit is unavailable.
	var_dump(func_get_args());
}
