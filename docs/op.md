# `OP()` Function

## Location

`asset/core/function/OP.php`

## Current Behavior

The `OP()` function returns an instantiated `\OP\OP` object.

The current implementation keeps the instance in a static local variable and reuses it.

That means the function behaves as a singleton-style access point.

## Flow

The current flow is:

1. check whether the static `$_OP` instance already exists
2. if not, instantiate `\OP\OP`
3. return the instance

## Technical Meaning

This makes `OP()` the shortest global access path to the framework object.

It avoids repeated manual instantiation and gives a unified call style such as:

- `OP()->Unit()`
- `OP()->Config()`
- `OP()->Session()`
- `OP()->Cookie()`

## Summary

`OP()` is the global function that returns the reusable framework object `\OP\OP`.
