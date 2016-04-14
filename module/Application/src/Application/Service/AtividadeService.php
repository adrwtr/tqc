<?php
namespace Application\Service;

// zend
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

use Application\Entity\Atividade;

class AtividadeService implements FactoryInterface
{

    /**
     * Principal objeto de controles do doctrine
     *
     * @var zend
     */
    private $objServiceLocator;


    /**
     * Fun?o implementada de FactoryInterface
     * Cria o servi?
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
     * @return Atividade
     */
    public function persistir($arrPost = array())
    {
        $objAtividade = new Atividade();

        if (
            isset($arrPost['cd_atividade']) &&
            $arrPost['cd_atividade'] != null &&
            $arrPost['cd_atividade'] != ''
        ) {
            $objAtividade = $this->getAtividade(
                $arrPost['cd_atividade']
            );
        }

        $objAtividade->setDsDescricao(
            $arrPost['ds_descricao']
        )->setDsDetalhes(
            $arrPost['ds_detalhes']
        )->setNrOrdem(
            $arrPost['nr_ordem']
        )->setObjProcesso(
            $arrPost['objProcesso']
        );

        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->persist($objAtividade);

        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->flush();

        return $objAtividade;
    }


    /**
     * Retorna o Atividade
     *
     * @return Application\Entity\Atividade
     */
    public function getAtividade($cd_atividade = null)
    {
        if ($cd_atividade == null) {
            $cd_atividade = 0;
        }

        $objAtividade = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->find(
                'Application\Entity\Atividade',
                $cd_atividade
            );

        if ($objAtividade == null) {
            throw new \Exception("Error: Atividade n? encontrado!", 1);
        }

        return $objAtividade;
    }

    /**
     * Remove um objeto do banco
     *
     * @param  Atividade $objAtividade [description]
     *
     * @return this
     */
    public function remover(Atividade $objAtividade)
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
