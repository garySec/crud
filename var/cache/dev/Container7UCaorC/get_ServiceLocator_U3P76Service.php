<?php

namespace Container7UCaorC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_U3P76Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.U_3P_76' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.U_3P_76'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'dispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
        ], [
            'dispatcher' => '?',
        ]);
    }
}
