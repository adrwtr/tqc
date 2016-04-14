<?php
namespace ModuleTest\Application\Service;

use ModuleTest\Bootstrap;
use ModuleTest\FixtureLoader;

use Application\Service\ProcessoService;
use Application\Service\AtividadeService;

class AtividadeServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testPersistirInsert()
    {
        FixtureLoader::init();
        FixtureLoader::execute();

        $objProcessoService = new ProcessoService();

        $objProcessoService->createService(
            Bootstrap::getServiceManager()
        );

        $objProcesso = $objProcessoService->getProcesso(1);

        $objAtividadeService = new AtividadeService();

        $objAtividadeService->createService(
            Bootstrap::getServiceManager()
        );

        $objAtividade = $objAtividadeService->persistir(
            array(
                'ds_descricao' => 'descricao 1',
                'ds_detalhes' => 'detalhes 1',
                'nr_ordem' => 1,
                'objProcesso' => $objProcesso
            )
        );

        // dump($this->getListaDeAtividades());

        $this->assertEquals(
            array(
                array(
                    'cd_atividade' => 1,
                    'ds_descricao' => 'Teste Descricao 1',
                    'ds_detalhes' => 'Teste Detalhes 1',
                    'nr_ordem' => 10
                ),
                array(
                    'cd_atividade' => 2,
                    'ds_descricao' => 'descricao 1',
                    'ds_detalhes' => 'detalhes 1',
                    'nr_ordem' => 1
                )
            ),
            $this->getListaDeAtividades()
        );

        $this->assertEquals(
            $objProcesso,
            $objAtividade->getObjProcesso()
        );

        // limpa banco
        FixtureLoader::destroy();
    }

    public function testPersistirUpdate()
    {
        FixtureLoader::init();
        FixtureLoader::execute();

        $objAtividadeService = new AtividadeService();

        $objAtividadeService->createService(
            Bootstrap::getServiceManager()
        );

        $objProcessoService = new ProcessoService();

        $objProcessoService->createService(
            Bootstrap::getServiceManager()
        );

        $objProcesso = $objProcessoService->getProcesso(1);

        $objAtividade = $objAtividadeService->persistir(
            array(
                'cd_atividade' => 1,
                'ds_descricao' => 'Teste Descricao 1 update',
                'ds_detalhes' => 'Teste Detalhes 1 update',
                'nr_ordem' => 11,
                'objProcesso' => $objProcesso
            )
        );

        $this->assertEquals(
            array(
                array(
                    'cd_atividade' => 1,
                    'ds_descricao' => 'Teste Descricao 1 update',
                    'ds_detalhes' => 'Teste Detalhes 1 update',
                    'nr_ordem' => 11
                )
            ),
            $this->getListaDeAtividades()
        );

        $this->assertEquals(
            $objProcesso,
            $objAtividade->getObjProcesso()
        );

        FixtureLoader::destroy();
    }

    public function testGetAtividade()
    {
        FixtureLoader::init();
        FixtureLoader::execute();

        $objAtividadeService = new AtividadeService();

        $objAtividadeService->createService(
            Bootstrap::getServiceManager()
        );

        $this->assertEquals(
            array(
                'cd_atividade' => 1,
                'ds_descricao' => 'Teste Descricao 1',
                'ds_detalhes' => 'Teste Detalhes 1',
                'nr_ordem' => 10
            ),
            $objAtividadeService->getAtividade(1)
                ->toArray()
        );

        FixtureLoader::destroy();
    }

    public function testRemover()
    {
        FixtureLoader::init();
        FixtureLoader::execute();

        $objAtividadeService = new AtividadeService();

        $objAtividadeService->createService(
            Bootstrap::getServiceManager()
        );

        $objAtividadeService->remover(
            $objAtividadeService->getAtividade(1)
        );

        $this->assertEquals(
            array(),
            $this->getListaDeAtividades()
        );

        FixtureLoader::destroy();
    }

    private function getListaDeAtividades()
    {
        return Bootstrap::getServiceManager()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\Atividade')
            ->createQueryBuilder('e')
            ->select('e')
            ->getQuery()
            ->getResult(
                \Doctrine\ORM\Query::HYDRATE_ARRAY
            );
    }
}