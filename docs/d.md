# `D()` Function

## Location

`asset/core/function/D.php`

## Current Behavior

The `D()` function is the debug dump entry function of the framework.

It does the following:

1. checks whether the current requester is an administrator
2. returns immediately if the requester is not an administrator
3. checks whether the Dump unit is installed
4. delegates the dump request to the Dump unit if available
5. falls back to native `var_dump()` if the Dump unit is unavailable

## Admin Restriction

The first important behavior is:

```php
if(!OP\OP::isAdmin() ){
	return;
}
```

That means debug output through `D()` is intentionally hidden from non-admin requesters.

## Delegation

If the Dump unit is installed, `D()` does not render output directly.

Instead it calls:

```php
OP()->Unit()->Dump()->Mark( func_get_args() );
```

This means the actual formatting behavior belongs to `op-unit-dump`.

## Fallback

If the Dump unit is not installed, `D()` falls back to:

```php
var_dump(func_get_args());
```

So `D()` still works in a minimal way even without the Dump unit, although the richer formatting is lost.

## Summary

The `D()` function is a protected debug entry point that delegates rich rendering to the Dump unit.
