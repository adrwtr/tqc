<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Application\Entity\Processo;

class ProcessoController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function formularioAction()
    {
        $cd_processo = $this->params()
            ->fromQuery('cd_processo');

        try {
            $objProcesso = $this->getServiceLocator()
                ->get('Application\Service\Processo')
                ->getProcesso(
                    $cd_processo
                );
        } catch (\Exception $e) {
            $objProcesso = new Processo();
        }

        return new ViewModel(
            array(
                'objProcesso' => $objProcesso
            )
        );
    }

    public function visualizarAction()
    {
        $cd_processo = $this->params()
            ->fromQuery('cd_processo');

        return new ViewModel(
            array(
                'objProcesso' => $this->getServiceLocator()
                    ->get('Application\Service\Processo')
                    ->getProcesso(
                        $cd_processo
                    )
            )
        );
    }

    public function listaAction()
    {
        $arrResultado = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\Processo')
            ->createQueryBuilder('e')
            ->select('e')
            ->getQuery()
            ->getResult(
                \Doctrine\ORM\Query::HYDRATE_ARRAY
            );

        return new JsonModel(
            array(
                'arrResultado' => $arrResultado
            )
        );
    }

    public function persistirAction()
    {
        $arrPost = json_decode(
            $this->getRequest()->getContent(),
            true
        );

        $this->getServiceLocator()
            ->get('Application\Service\Processo')
            ->persistir($arrPost);

        return new JsonModel(
            array(
                'enviado' => true
            )
        );
    }

    public function excluirAction()
    {
        $cd_processo = $this->params()
            ->fromQuery('cd_processo');

        $objProcesso = $this->getServiceLocator()
            ->get('Application\Service\Processo')
            ->getProcesso(
                $cd_processo
            );

        $this->getServiceLocator()
            ->get('Application\Service\Processo')
            ->remover(
                $objProcesso
            );

        $this->redirect()
            ->toRoute('processos');
    }


}
