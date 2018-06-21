<?php

namespace AppBundle\Exception;

use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class ValidationFailException
 * @package AppBundle\Exception
 */
class ValidationFailException extends \Exception
{
    /**
     * @var ConstraintViolationListInterface
     */
    private $violations;

    /**
     * ValidationFailException constructor.
     * @param ConstraintViolationListInterface $violations
     */
    public function __construct($violations)
    {
        $this->violations = $violations;
    }

    /**
     * @return ConstraintViolationListInterface
     */
    public function getViolations()
    {
        return $this->violations;
    }

    /**
     * @param ConstraintViolationListInterface $violations
     */
    public function setViolations(ConstraintViolationListInterface $violations)
    {
        $this->violations = $violations;
    }
}