<?php

namespace Prototype\Tests;

use BarBookPrototype;
use FooBookPrototype;

spl_autoload_register(function ($class) {
    include __DIR__ . '/../' . $class . '.php';
});

/**
 * Class PrototypeTest
 * @package Prototype\Tests
 */
class PrototypeTest
{
    /**
     * Test Prototype.
     */
    public function test()
    {
        $fooPrototype = new FooBookPrototype();
        $barPrototype = new BarBookPrototype();

        // clone object
        var_dump(microtime());
        for ($i = 0; $i < 1000; $i++) {
            $book = clone $fooPrototype;
            $book->setTitle('Foo Book No ' . $i);
        }
        for ($i = 0; $i < 1000; $i++) {
            $book = clone $barPrototype;
            $book->setTitle('Bar Book No ' . $i);
        }
        var_dump(microtime());
        echo 'TEST_#2' . "\n";
        // new object
        var_dump(microtime());
        for ($i = 0; $i < 1000; $i++) {
            $book = new FooBookPrototype();
            $book->setTitle('Foo Book No ' . $i);
        }
        for ($i = 0; $i < 1000; $i++) {
            $book =  new BarBookPrototype();
            $book->setTitle('Bar Book No ' . $i);
        }
        var_dump(microtime());
    }
}

// Run test.
(new PrototypeTest)->test();