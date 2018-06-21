<?php

namespace Tests\AppBundle\Controller;

use PHPUnit\Framework\TestCase;

class DefaultControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->assertEquals(42, 42);
    }
}
