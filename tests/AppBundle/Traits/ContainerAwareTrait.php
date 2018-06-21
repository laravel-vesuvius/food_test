<?php

namespace Tests\AppBundle\Traits;

use Symfony\Component\DependencyInjection\ContainerInterface;

trait ContainerAwareTrait
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @before
     */
    public function setUpContainer()
    {
        $this->container = static::bootKernel()->getContainer();
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
}
