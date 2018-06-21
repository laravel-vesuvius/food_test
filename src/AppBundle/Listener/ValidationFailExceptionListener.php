<?php

namespace AppBundle\Listener;

use AppBundle\Exception\ValidationFailException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

/**
 * Class ValidationFailExceptionListener
 * @package AppBundle\Listener
 */
class ValidationFailExceptionListener
{
    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function handleErrors(GetResponseForExceptionEvent $event)
    {
        if ($event->getException() instanceof ValidationFailException) {

            $errors = [];

            foreach ($event->getException()->getViolations() as $violation) {
                $errors[$violation->getPropertyPath()] = $violation->getMessage();
            }

            $event->setResponse(new JsonResponse($errors));
        }
    }
}