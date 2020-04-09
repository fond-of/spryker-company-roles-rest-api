<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi;

use Codeception\Test\Unit;
use Spryker\Client\Kernel\Container;

class CompanyRolesRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiDependencyProvider
     */
    protected $companyRolesRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
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
    public function testProvideServiceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyRolesRestApiDependencyProvider->provideServiceLayerDependencies(
                $this->containerMock
            )
        );
    }
}
