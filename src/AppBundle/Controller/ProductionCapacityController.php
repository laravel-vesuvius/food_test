<?php

namespace AppBundle\Controller;

use AppBundle\Service\ProductionCapacityService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductionCapacityController
 * @package AppBundle\Controller
 */
class ProductionCapacityController extends FOSRestController
{
    /**
     * @param Request $request
     * @Rest\Post("/capacity")
     * @return array
     */
    public function postAction(Request $request)
    {
        return $this->get(ProductionCapacityService::class)->create($request->request->get('productionCapacities') ?? []);
    }
}

