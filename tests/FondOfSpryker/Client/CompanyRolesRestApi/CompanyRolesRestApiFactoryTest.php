<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\CompanyRolesRestApi\Zed\CompanyRolesRestApiStubInterface;
use Spryker\Client\Kernel\Container;

class CompanyRolesRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiFactory
     */
    protected $companyRolesRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface
     */
    protected $companyRolesRestApiToZedRequestClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiToZedRequestClientInterfaceMock = $this->getMockBuilder(CompanyRolesRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiFactory = new CompanyRolesRestApiFactory();
        $this->companyRolesRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateZedCompanyRolesRestApiStub(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyRolesRestApiDependencyProvider::CLIENT_ZED_REQUEST)
            ->willReturn($this->companyRolesRestApiToZedRequestClientInterfaceMock);

        $this->assertInstanceOf(
            CompanyRolesRestApiStubInterface::class,
            $this->companyRolesRestApiFactory->createZedCompanyRolesRestApiStub()
        );
    }
}
