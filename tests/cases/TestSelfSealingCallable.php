<?php
/**
 * @license MIT
 * Copyright 2024 Dustin Wilson, et al.
 * See LICENSE and AUTHORS files for details
 */

declare(strict_types=1);
namespace MensBeam\SelfSealingCallable\Test;
use MensBeam\SelfSealingCallable;
use PHPUnit\Framework\{
    TestCase,
    Attributes\CoversClass
};


#[CoversClass('MensBeam\SelfSealingCallable')]
class TestSelfSealingCallable extends TestCase {
    public function testInvocation(): void {
        $c = new SelfSealingCallable(fn() => 'ook');
        $this->assertSame('ook', $c());
        $c->disable();
        $this->assertFalse($c());
        $c->enable();
        $this->assertSame('ook', $c());
    }
}