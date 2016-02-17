<?php
namespace Application\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

use Application\Entity\Processo;


class ProcessoFixtureLoader implements FixtureInterface
{
    public function load(ObjectManager $objEntityManager)
    {
        $objProcesso = new Processo();
        $objProcesso->setDsNome('Teste Nome 1');
        $objProcesso->setDsDescricao('Teste Descricao 1');

        $objEntityManager->persist($objProcesso);
        $objEntityManager->flush();
    }
}