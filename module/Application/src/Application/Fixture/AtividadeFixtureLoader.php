<?php
namespace Application\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

use Application\Entity\Atividade;


class AtividadeFixtureLoader implements FixtureInterface
{
    public function load(ObjectManager $objEntityManager)
    {
        $objAtividade = new Atividade();
        $objAtividade->setDsDescricao('Teste Descricao 1');
        $objAtividade->setDsDetalhes('Teste Detalhes 1');
        $objAtividade->setNrOrdem(10);

        $objEntityManager->persist($objAtividade);
        $objEntityManager->flush();
    }
}