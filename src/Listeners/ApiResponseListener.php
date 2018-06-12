<?php
namespace App\Listeners;

use App\Entities\TransformableEntity;
use App\Transformers\CollectionTransformer;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ApiResponseListener implements EventSubscriberInterface
{
    /**
     * @param GetResponseForControllerResultEvent $event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $controllerResult = $event->getControllerResult();

        // Convert doctrine collection to array
        if ($controllerResult instanceof Collection || is_array($controllerResult)) {
            $transformer = new CollectionTransformer;
            $controllerResult = $transformer->transform($controllerResult);
        }

        // Convert transformable entity to array
        if ($controllerResult instanceof TransformableEntity) {
            $controllerResult = $controllerResult->transform();
        }

        // Convert array to json
        if (is_array($controllerResult)) {
            $response = new JsonResponse([
                'data' => $controllerResult,
            ]);
            $event->setResponse($response);
        }
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['onKernelView', 0],
        ];
    }
}
