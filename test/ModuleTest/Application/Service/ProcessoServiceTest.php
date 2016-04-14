<?php
namespace ModuleTest\Application\Service;

use ModuleTest\Bootstrap;
use ModuleTest\FixtureLoader;

use Application\Service\ProcessoService;

class ProcessoServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testPersistirInsert()
    {
        $objProcessoService = new ProcessoService();

        $objProcessoService->createService(
            Bootstrap::getServiceManager()
        );

        $objProcesso = $objProcessoService->persistir(
            array(
                'ds_nome' => 'nome 1',
                'ds_descricao' => 'descricao 1'
            )
        );

        $this->assertEquals(
            array(
                array(
                    'cd_processo' => 1,
                    'ds_nome' => 'nome 1',
                    'ds_descricao' => 'descricao 1'
                )
            ),
            $this->getListaDeProcessos()
        );

        // limpa banco
        FixtureLoader::init();
        FixtureLoader::destroy();
    }

    public function testPersistirUpdate()
    {
        FixtureLoader::init();
        FixtureLoader::execute();

        $objProcessoService = new ProcessoService();

        $objProcessoService->createService(
            Bootstrap::getServiceManager()
        );

        $objProcesso = $objProcessoService->persistir(
            array(
                'cd_processo' => 1,
                'ds_nome' => 'nome 1',
                'ds_descricao' => 'descricao 1'
            )
        );

        $this->assertEquals(
            array(
                array(
                    'cd_processo' => 1,
                    'ds_nome' => 'nome 1',
                    'ds_descricao' => 'descricao 1'
                )
            ),
            $this->getListaDeProcessos()
        );

        FixtureLoader::destroy();
    }

    public function testGetProcesso()
    {
        FixtureLoader::init();
        FixtureLoader::execute();

        $objProcessoService = new ProcessoService();

        $objProcessoService->createService(
            Bootstrap::getServiceManager()
        );

        $this->assertEquals(
            array(
                'cd_processo' => 1,
                'ds_nome' => 'Teste Nome 1',
                'ds_descricao' => 'Teste Descricao 1'
            ),
            $objProcessoService->getProcesso(1)
                ->toArray()
        );

        FixtureLoader::destroy();
    }

    public function testRemover()
    {
        FixtureLoader::init();
        FixtureLoader::execute();

        $objProcessoService = new ProcessoService();

        $objProcessoService->createService(
            Bootstrap::getServiceManager()
        );

        $objProcessoService->remover(
            $objProcessoService->getProcesso(1)
        );

        $this->assertEquals(
            array(),
            $this->getListaDeProcessos()
        );

        FixtureLoader::destroy();
    }

    private function getListaDeProcessos()
    {
        return Bootstrap::getServiceManager()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\Processo')
            ->createQueryBuilder('e')
            ->select('e')
            ->getQuery()
            ->getResult(
                \Doctrine\ORM\Query::HYDRATE_ARRAY
            );
    }
}