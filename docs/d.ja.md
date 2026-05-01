# `D()` 関数

## 場所

`asset/core/function/D.php`

## 現在の挙動

`D()` 関数は framework の debug dump entry function です。

現在の挙動は次の通りです。

1. 現在の requestor が administrator かどうかを確認する
2. administrator でなければ即 return する
3. Dump unit がインストールされているか確認する
4. 利用可能なら Dump unit に dump request を委譲する
5. Dump unit が利用できない場合は fallback として native `var_dump()` を使う

## administrator 制限

まず重要なのは次の挙動です。

```php
if(!OP\OP::isAdmin() ){
	return;
}
```

つまり、`D()` による debug 出力は、administrator ではない requestor には意図的に見せない設計です。

## 委譲

Dump unit が利用可能な場合、`D()` 自体は出力を直接描画しません。

代わりに次を呼びます。

```php
OP()->Unit()->Dump()->Mark( func_get_args() );
```

つまり、実際の formatting の責務は `op-unit-dump` 側にあります。

## fallback

Dump unit がインストールされていない場合、`D()` は次に fallback します。

```php
var_dump(func_get_args());
```

したがって、Dump unit がない環境でも最低限の dump は可能ですが、豊かな formatting は失われます。

## まとめ

`D()` 関数は、保護された debug entry point であり、見やすい描画は Dump unit に委譲します。
