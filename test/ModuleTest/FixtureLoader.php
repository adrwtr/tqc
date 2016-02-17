<?php
namespace ModuleTest;

use ModuleTest\Bootstrap;

class FixtureLoader
{
    const ds_path = '../module/Application/src/Application/Fixture';
    protected static $objORMPurger;

    /**
     * Inicia purge de fixture
     */
    public static function init()
    {
        static::$objORMPurger = new \Doctrine\Common\DataFixtures\Purger\ORMPurger(
            Bootstrap::getServiceManager()
                ->get('Doctrine\ORM\EntityManager')
        );

        self::destroy();
    }

    /**
     * executa as fixtures
     *
     * @return
     */
    public static function execute()
    {
        $objLoader = new \Doctrine\Common\DataFixtures\Loader();

        $objLoader->loadFromDirectory(
            FixtureLoader::ds_path
        );

        $objORMExecutor = new \Doctrine\Common\DataFixtures\Executor\ORMExecutor(
            Bootstrap::getServiceManager()
                ->get('Doctrine\ORM\EntityManager'),
            self::getORMPurger()
        );

        $objORMExecutor->execute(
            $objLoader->getFixtures()
        );
    }

    /**
     * Limpa o banco
     */
    public static function destroy()
    {
        self::getORMPurger()
            ->setPurgeMode(
                \Doctrine\Common\DataFixtures\Purger\ORMPurger::PURGE_MODE_TRUNCATE
            );

        self::getORMPurger()
            ->purge();
    }

    public static function getORMPurger()
    {
        return static::$objORMPurger;
    }
}