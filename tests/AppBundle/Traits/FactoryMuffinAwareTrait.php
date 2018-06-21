<?php

namespace Tests\AppBundle\Traits;

use League\FactoryMuffin\FactoryMuffin;
use League\FactoryMuffin\Stores\RepositoryStore;

trait FactoryMuffinAwareTrait
{
    /**
     *
     */
    abstract public function getContainer();

    /**
     * @var FactoryMuffin
     */
    public $factory;

    /**
     * @before
     * @throws \League\FactoryMuffin\Exceptions\DirectoryNotFoundException
     */
    public function setUpFactoryMuffin()
    {
        $store = new RepositoryStore($this->getContainer()->get('doctrine.orm.entity_manager'));
        $this->factory = new FactoryMuffin($store);
        $this->factory->loadFactories(__DIR__.'/../Factories');
    }
}
