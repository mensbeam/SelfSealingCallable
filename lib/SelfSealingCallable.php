<?php
/**
 * @license MIT
 * Copyright 2024 Dustin Wilson, et al.
 * See LICENSE and AUTHORS files for details
 */

declare(strict_types=1);
namespace MensBeam;


class SelfSealingCallable {
    protected \Closure $callable;
    protected bool $enabled;




    public function __construct(callable $callable) {
        $this->callable = \Closure::fromCallable($callable);
        $this->enabled = true;
    }




    public function __invoke(): mixed {
        if ($this->enabled === false) {
            return false;
        }

        return ($this->callable)();
    }

    public function disable() {
        $this->enabled = false;
    }

    public function enable() {
        $this->enabled = true;
    }
}