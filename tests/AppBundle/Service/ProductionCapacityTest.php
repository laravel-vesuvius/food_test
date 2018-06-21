<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\ProductGroup;
use AppBundle\Entity\ProductionCapacity;
use AppBundle\Entity\ProductionUnit;
use AppBundle\Entity\TimeUnit;
use AppBundle\Exception\ValidationFailException;
use AppBundle\Service\ProductionCapacityService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\AppBundle\Traits\ContainerAwareTrait;
use Tests\AppBundle\Traits\FactoryMuffinAwareTrait;

class ProductionCapacityTest extends KernelTestCase
{
    use FactoryMuffinAwareTrait;
    use ContainerAwareTrait;

    /**
     * @var ProductionCapacityService
     */
    private $service;

    /**
     *
     */
    public function setUp()
    {
        $this->service = $this->getContainer()->get(ProductionCapacityService::class);
    }

    /**
     * @throws ValidationFailException
     */
    public function testProductionCapacityService()
    {
        $res = $this->service->create([]);
        $this->assertEquals($res, []);

        $pg = $this->factory->create(ProductGroup::class);
        $pu = $this->factory->create(ProductionUnit::class);
        $tu = $this->factory->create(TimeUnit::class);

        $data = [
            [
                'amount' => 10,
                'productionUnit' => $pu->getId(),
                'timeUnit' => $tu->getId(),
                'productGroup' => $pg->getId()
            ],
            [
                'amount' => 500,
                'productionUnit' => $pu->getId(),
                'timeUnit' => $tu->getId(),
                'productGroup' => $pg->getId()
            ]
        ];

        $res = $this->service->create($data);

        $this->assertCount(2, $res);
        $this->assertContainsOnlyInstancesOf(ProductionCapacity::class, $res);
    }

    /**
     * @throws ValidationFailException
     */
    public function testValidation()
    {
        $data = [
            [
                'amount' => 10,
                'productionUnit' => 1000,
                'timeUnit' => 1000,
                'productGroup' => 1000
            ],
            [
                'amount' => 500,
                'productionUnit' => 1000,
                'timeUnit' => 1000,
                'productGroup' => 1000
            ]
        ];

        $this->expectException(ValidationFailException::class);
        $this->service->create($data);
    }
}