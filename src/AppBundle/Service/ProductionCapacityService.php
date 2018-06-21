<?php

namespace AppBundle\Service;

use AppBundle\Entity\ProductionCapacity;
use AppBundle\Exception\ValidationFailException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ProductionCapacityService
 * @package AppBundle\Services
 */
class ProductionCapacityService
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * ProductionCapacityService constructor.
     * @param SerializerInterface $serializer
     * @param ValidatorInterface $validator
     */
    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $em
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->em = $em;
    }

    /**
     * @param $data
     * @return mixed
     * @throws ValidationFailException
     */
    public function create(array $data)
    {
        $capacities = $this->serializer->denormalize(
            $data,
            ProductionCapacity::class.'[]',
            null,
            [ObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]
        );

        $violations = $this->validator->validate($capacities);

        if ($violations->count()) {
            throw new ValidationFailException($violations);
        }

        foreach ($capacities as $capacity) {
            $this->em->persist($capacity);
        }

        $this->em->beginTransaction();

            $this->em->getRepository(ProductionCapacity::class)
                ->createQueryBuilder('p')
                ->delete()
                ->getQuery()
                ->execute();

            $this->em->flush();

        $this->em->commit();

        return $capacities;
    }

}