<?php
namespace Application\Service;

// zend
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

use Application\Entity\Processo;

class AtividadeService implements FactoryInterface
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

    }


    /**
     * Retorna o processo
     *
     * @return Application\Entity\Processo
     */
    public function getProcesso($cd_atividade = null)
    {
        if ($cd_atividade == null) {
            $cd_atividade = 0;
        }

        $objAtividade = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->find(
                'Application\Entity\Processo',
                $cd_atividade
            );

        if ($objAtividade == null) {
            throw new \Exception("Error: Processo não encontrado!", 1);
        }

        return $objAtividade;
    }

    /**
     * Remove um objeto do banco
     *
     * @param  Processo $objAtividade [description]
     *
     * @return this
     */
    public function remover(Processo $objAtividade)
    {
        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->remove($objAtividade);

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
