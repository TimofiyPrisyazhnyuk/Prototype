<?php

namespace Prototype\Tests;

use Prototype\BarBookPrototype;
use Prototype\FooBookPrototype;

require  __DIR__ .'/../BookPrototype.php';
require  __DIR__ .'/../BarBookPrototype.php';
require  __DIR__ .'/../FooBookPrototype.php';

class PrototypeTest
{
    public function testCanGetFooBook()
    {
        $fooPrototype = new FooBookPrototype();
        $barPrototype = new BarBookPrototype();

        // clone object
        $time = microtime();
        echo 'START N1- ' . $time . "\n";
        for ($i = 0; $i < 1000; $i++) {
            $book = clone $fooPrototype;
            $book->setTitle('Foo Book No ' . $i);
        }
        for ($i = 0; $i < 1000; $i++) {
            $book = clone $barPrototype;
            $book->setTitle('Bar Book No ' . $i);
        }
        $time1 = microtime();
        echo 'N1 - ' . (float)$time1 - (float)$time . "\n";
        // new object
        $time = microtime();
        echo 'START N2 - ' . $time . "\n";
        for ($i = 0; $i < 1000; $i++) {
            $book = new FooBookPrototype();
            $book->setTitle('Foo Book No ' . $i);
        }
        for ($i = 0; $i < 1000; $i++) {
            $book =  new BarBookPrototype();
            $book->setTitle('Bar Book No ' . $i);
        }
        $time1 = microtime();
        echo 'N2 - ' . (float)$time1 - (float)$time . "\n";

    }
}

(new PrototypeTest)->testCanGetFooBook();