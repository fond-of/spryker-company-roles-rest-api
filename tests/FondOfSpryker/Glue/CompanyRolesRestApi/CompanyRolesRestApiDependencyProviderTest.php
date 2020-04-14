<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi;

use Codeception\Test\Unit;
use Spryker\Glue\Kernel\Container;

class CompanyRolesRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiDependencyProvider
     */
    protected $companyRolesRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiDependencyProvider = new CompanyRolesRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyRolesRestApiDependencyProvider->provideDependencies(
                $this->containerMock
            )
        );
    }
}
