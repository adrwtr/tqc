<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Application\Entity\Atividade;

class AtividadeController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function formularioAction()
    {
        $cd_atividade = $this->params()
            ->fromQuery('cd_atividade');

        $cd_processo = $this->params()
            ->fromQuery('cd_processo');

       /* try {
            $objAtividade = $this->getServiceLocator()
                ->get('Application\Service\Atividade')
                ->getAtividade(
                    $cd_atividade
                );
        } catch (\Exception $e) {*/
            $objAtividade = new Atividade();
        // }

        return new ViewModel(
            array(
                'objAtividade' => $objAtividade,
                'cd_processo' => $cd_processo
            )
        );
    }

    public function visualizarAction()
    {
        $cd_atividade = $this->params()
            ->fromQuery('cd_atividade');

        return new ViewModel(
            array(
                'objAtividade' => $this->getServiceLocator()
                    ->get('Application\Service\Atividade')
                    ->getAtividade(
                        $cd_atividade
                    )
            )
        );
    }

    public function listaAction()
    {
        $arrResultado = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\Atividade')
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
            ->get('Application\Service\Atividade')
            ->persistir($arrPost);

        return new JsonModel(
            array(
                'enviado' => true
            )
        );
    }

    public function excluirAction()
    {
        $cd_atividade = $this->params()
            ->fromQuery('cd_atividade');

        $objAtividade = $this->getServiceLocator()
            ->get('Application\Service\Atividade')
            ->getAtividade(
                $cd_atividade
            );

        $this->getServiceLocator()
            ->get('Application\Service\Atividade')
            ->remover(
                $objAtividade
            );

        $this->redirect()
            ->toRoute('Atividades');
    }


}
