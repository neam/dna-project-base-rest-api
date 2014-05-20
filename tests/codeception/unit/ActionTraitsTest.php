<?php
use Codeception\Util\Stub;

trait IndexActionTrait
{
    public function actionIndex()
    {
        return "foo";
    }
}

class Foo
{
    use IndexActionTrait {
        IndexActionTrait::actionIndex as actionIndexFromTrait;
    }

    public function actionIndex()
    {
        return "bar";
    }
}

require(dirname(__FILE__) . '/../../../vendor/yiisoft/yii/framework/base/CComponent.php');
require(dirname(__FILE__) . '/../../../vendor/yiisoft/yii/framework/web/CBaseController.php');
require(dirname(__FILE__) . '/../../../vendor/yiisoft/yii/framework/web/CController.php');

class FooController extends CController
{
    use IndexActionTrait {
        IndexActionTrait::actionIndex as actionIndexFromTrait;
    }

    public function actionIndex()
    {
        return "bar";
    }
}

class ActionTraitsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testDemonstrateTraitInheritance()
    {
        $controller = new Foo();
        $this->assertEquals(true, method_exists($controller, 'actionIndex'));
        $this->assertEquals(true, method_exists($controller, 'actionIndexFromTrait'));
        $this->assertEquals("bar", $controller->actionIndex());
        $this->assertEquals("foo", $controller->actionIndexFromTrait());

        $controller = new FooController('Foo');
        $this->assertEquals(true, method_exists($controller, 'actionIndex'));
        $this->assertEquals(true, method_exists($controller, 'actionIndexFromTrait'));
        $this->assertEquals("bar", $controller->actionIndex());
        $this->assertEquals("foo", $controller->actionIndexFromTrait());
    }
}
