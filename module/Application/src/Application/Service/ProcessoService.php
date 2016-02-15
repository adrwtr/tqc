<?php
namespace Application\Service;

// zend
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class ProcessoService implements FactoryInterface
{

    /**
     * Principal objeto de controles do doctrine
     *
     * @var Doctrine\ORM\EntityManager
     */
    private $objServiceLocator;


    /**
     * Função implementada de FactoryInterface
     * Cria o serviço do doctrine
     *
     * @param ServiceLocatorInterface $objServiceLocator
     *
     * @return Doctrine\ORM\EntityManager
     */
    public function createService(
        ServiceLocatorInterface $objServiceLocator
    ) {

        $this->$objServiceLocator = $objServiceLocator;

        return $this;
    }
}
