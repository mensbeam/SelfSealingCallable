# Self-Sealing Callable #

> You won't find a better Self-Sealing Callable in this sector!

_Self-Sealing Callable_ is a class that implements `__invoke()` which can enable and disable itself. When registering shutdown functions in PHP it's not possible to unregister them. This class exists to be used in this case. By calling `SelfSealingCallable->disable()` it will return `false` when invoked, allowing retroactive disabling of the shutdown handler.


## Requirements ##

* PHP 8.1


## Installation ##

```shell
composer require mensbeam/self-sealing-callable
```


## Usage ##

It's pretty simple:

```php
use MensBeam\SelfSealingCallable;

$callable = new SelfSealingCallable(fn() => 'ook');
$ook = $callable();
// 'ook'
$callable->disable();
$ook = $callable();
// false
$callable->enable();
$ook = $callable();
// 'ook'

```