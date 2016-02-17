<?php
namespace Application\Service;

// zend
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

use Application\Entity\Processo;

class ProcessoService implements FactoryInterface
{

    /**
     * Principal objeto de controles do doctrine
     *
     * @var zend
     */
    private $objServiceLocator;


    /**
     * Função implementada de FactoryInterface
     * Cria o serviço
     *
     * @param ServiceLocatorInterface $objServiceLocator
     *
     * @return this
     */
    public function createService(
        ServiceLocatorInterface $objServiceLocator
    ) {
        $this->objServiceLocator = $objServiceLocator;

        return $this;
    }

    /**
     * Persiste um objeto
     *
     * @param  array  $arrPost [description]
     *
     * @return Processo
     */
    public function persistir($arrPost = array())
    {
        $objProcesso = new Processo();

        if (isset($arrPost['id']) && $arrPost['id'] != null && $arrPost['id'] != '') {
            $objProcesso = $this->getProcesso(
                $arrPost['id']
            );
        }

        $objProcesso->setDsNome(
            $arrPost['ds_nome']
        )->setDsDescricao(
            $arrPost['ds_descricao']
        );

        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->persist($objProcesso);

        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->flush();

        return $objProcesso;
    }


    /**
     * Retorna o processo
     *
     * @return Application\Entity\Processo
     */
    public function getProcesso($cd_processo = null)
    {
        if ($cd_processo == null) {
            $cd_processo = 0;
        }

        $objProcesso = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->find(
                'Application\Entity\Processo',
                $cd_processo
            );

        if ($objProcesso == null) {
            throw new \Exception("Error: Processo não encontrado!", 1);
        }

        return $objProcesso;
    }

    /**
     * Remove um objeto do banco
     *
     * @param  Processo $objProcesso [description]
     *
     * @return this
     */
    public function remover(Processo $objProcesso)
    {
        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->remove($objProcesso);

        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->flush();

        return $this;
    }

    /**
     * Retorna o service locator
     *
     * @return zend/servicelocator
     */
    private function getServiceLocator()
    {
        return $this->objServiceLocator;
    }
}
