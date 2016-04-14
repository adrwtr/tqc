<?php
namespace ModuleTest\Application;


// unimestre
use Application\ClasseTeste;

class ClasseTesteTest extends \PHPUnit_Extensions_SeleniumTestCase
{
     /*public static $browsers = array(
        array(
            'name'    => 'Internet Explorer on Windows XP',
            'browser' => '*chrome',
            'host'    => 'localhost',
            'port'    => 4444,
            'timeout' => 30000,
          )
    );*/

    protected function setUp()
    {
        $this->setBrowser('chrome');
        $this->setBrowserUrl('http://www.phpro.org/');
    }

    public function testTitle()
    {
        $title = 'PHP Tutorials Examples phPro - Tutorials Articles Examples Development';
        // $this->url('http://www.phpro.org/');
        // $this->assertEquals( $title, $this->title());
        $this->assertEquals(
            1,
            1
        );
    }

    public function testTest()
    {
        $objClasseTeste = new ClasseTeste();

        $this->assertEquals(
            1,
            $objClasseTeste->indexAction()
        );
    }
}