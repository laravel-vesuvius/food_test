<?php

/** @var $fm \League\FactoryMuffin\FactoryMuffin */

$fm->define(\AppBundle\Entity\ProductGroup::class)->setDefinitions([
    'name' => \AppBundle\Helper\Str::generateRandomString(5),
]);

$fm->define(\AppBundle\Entity\ProductionUnit::class)->setDefinitions([
    'name' => \AppBundle\Helper\Str::generateRandomString(5),
]);
$fm->define(\AppBundle\Entity\TimeUnit::class)->setDefinitions([
    'name' => \AppBundle\Helper\Str::generateRandomString(5),
]);
