<?php
namespace Teams\Model;

use Teams\Controller\UpdateController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


class UpdateControllerFactory implements FactoryInterface
{


    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        $addController = new UpdateController($services->get('Omeka\EntityManager'));
        return $addController;
    }
}

