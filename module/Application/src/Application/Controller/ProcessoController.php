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
        // se for incluir
        // apenas cria um novo
        try {
            $objProcesso = $this->getProcesso();
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
        return new ViewModel(
            array(
                'objProcesso' => $this->getProcesso()
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

        $objProcesso = new Processo();


        if ($arrPost['id'] != null && $arrPost['id'] != '') {
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

        return new JsonModel(
            array(
                'enviado' => true
            )
        );
    }

    public function excluirAction()
    {
        $objProcesso = $this->getProcesso();

        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->remove($objProcesso);

        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->flush();

        $this->redirect()
            ->toRoute('processos');
    }

    /**
     * Retorna o processo
     *
     * @return Application\Entity\Processo
     */
    private function getProcesso($id = null)
    {
        $cd_processo = $this->params()
            ->fromQuery('cd_processo');

        if ($id != null) {
            $cd_processo = $id;
        }

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
}
