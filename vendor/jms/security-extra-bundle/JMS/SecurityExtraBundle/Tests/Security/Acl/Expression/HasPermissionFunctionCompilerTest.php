<<<<<<< HEAD
<?php

namespace JMS\SecurityExtraBundle\Tests\Security\Acl\Expression;

=======
<?php

namespace JMS\SecurityExtraBundle\Tests\Security\Acl\Expression;

>>>>>>> 80f68e249177bbb9188db2639a3d26547c148091
use JMS\SecurityExtraBundle\Security\Acl\Expression\HasPermissionFunctionCompiler;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Ast\VariableExpression;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Ast\ConstantExpression;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Ast\FunctionExpression;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\ExpressionCompiler;
<<<<<<< HEAD

class HasPermissionFunctionCompilerTest extends \PHPUnit_Framework_TestCase
{
    private $compiler;

    public function testCompile()
    {
        $source = $this->compiler->compile(new FunctionExpression('hasPermission',
            array(new VariableExpression('foo'), new ConstantExpression('VIEW'))));

        $this->assertContains(
            "\$context['permission_evaluator']->hasPermission(\$context['token'], \$context['foo'], 'VIEW');",
            $source);
    }

    public function testCompileUpperCasesPermissions()
    {
        $source = $this->compiler->compile(new FunctionExpression('hasPermission',
            array(new VariableExpression('foo'), new ConstantExpression('view'))));

        $this->assertContains(
            "\$context['permission_evaluator']->hasPermission(\$context['token'], \$context['foo'], 'VIEW');",
            $source);
    }

    protected function setUp()
    {
        $this->compiler = new ExpressionCompiler();
        $this->compiler->addFunctionCompiler(new HasPermissionFunctionCompiler());
    }
=======

class HasPermissionFunctionCompilerTest extends \PHPUnit_Framework_TestCase
{
    private $compiler;

    public function testCompile()
    {
        $source = $this->compiler->compile(new FunctionExpression('hasPermission',
            array(new VariableExpression('foo'), new ConstantExpression('VIEW'))));

        $this->assertContains(
            "\$context['permission_evaluator']->hasPermission(\$context['token'], \$context['foo'], 'VIEW');",
            $source);
    }

    public function testCompileUpperCasesPermissions()
    {
        $source = $this->compiler->compile(new FunctionExpression('hasPermission',
            array(new VariableExpression('foo'), new ConstantExpression('view'))));

        $this->assertContains(
            "\$context['permission_evaluator']->hasPermission(\$context['token'], \$context['foo'], 'VIEW');",
            $source);
    }

    protected function setUp()
    {
        $this->compiler = new ExpressionCompiler();
        $this->compiler->addFunctionCompiler(new HasPermissionFunctionCompiler());
    }
>>>>>>> 80f68e249177bbb9188db2639a3d26547c148091
}