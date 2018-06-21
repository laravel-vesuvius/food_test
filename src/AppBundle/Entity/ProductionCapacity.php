<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProductionCapacity
 *
 * @ORM\Entity
 */
class ProductionCapacity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @Assert\Range(min = 0)
     */
    protected $amount = 0;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="ProductGroup", inversedBy="capacities")
     * @Assert\NotBlank()
     */
    protected $productGroup;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="ProductionUnit", inversedBy="capacities")
     * @Assert\NotBlank()
     */
    protected $productionUnit;

    /**
     * @var object
     *
     * @ORM\ManyToOne(targetEntity="TimeUnit", inversedBy="capacities")
     * @Assert\NotBlank()
     */
    protected $timeUnit;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return object
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return object
     */
    public function getProductGroup()
    {
        return $this->productGroup;
    }

    /**
     * @param ProductGroup|null $productGroup
     * @return $this
     */
    public function setProductGroup(ProductGroup $productGroup = null)
    {
        $this->productGroup = $productGroup;

        return $this;
    }

    /**
     * @return object
     */
    public function getProductionUnit()
    {
        return $this->productionUnit;
    }

    /**
     * @param ProductionUnit|null $productionUnit
     * @return $this
     */
    public function setProductionUnit(ProductionUnit $productionUnit = null)
    {
        $this->productionUnit = $productionUnit;

        return $this;
    }

    /**
     * @return object
     */
    public function getTimeUnit()
    {
        return $this->timeUnit;
    }

    /**
     * @param TimeUnit|null $timeUnit
     * @return $this
     */
    public function setTimeUnit(TimeUnit $timeUnit = null)
    {
        $this->timeUnit = $timeUnit;

        return $this;
    }
}