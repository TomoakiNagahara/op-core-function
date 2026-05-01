# `OP()` 関数

## 場所

`asset/core/function/OP.php`

## 現在の挙動

`OP()` 関数は、生成済みの `\OP\OP` object を返します。

現在の実装では、その instance を static local 変数に保持して再利用します。

つまり、この関数は singleton 的な access point として振る舞います。

## 流れ

現在の流れは次の通りです。

1. static な `$_OP` instance が既にあるか確認する
2. まだなければ `\OP\OP` を instantiate する
3. その instance を返す

## 技術的な意味

これにより、`OP()` は framework object に到達する最短の global access path になります。

毎回の manual instantiate を避けられ、次のような統一呼び出しが可能になります。

- `OP()->Unit()`
- `OP()->Config()`
- `OP()->Session()`
- `OP()->Cookie()`

## まとめ

`OP()` は、再利用される framework object `\OP\OP` を返す global function です。
