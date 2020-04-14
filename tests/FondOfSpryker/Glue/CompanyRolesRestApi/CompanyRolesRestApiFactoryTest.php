<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClient;
use FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleReaderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\Kernel\Container;

class CompanyRolesRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiFactory
     */
    protected $companyRolesRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClient
     */
    protected $companyRolesRestApiClientMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientInterface
     */
    protected $companyRolesRestApiToCompanyRoleClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->restResourceBuilderInterfaceMock = $this->getMockBuilder(RestResourceBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiClientMock = $this->getMockBuilder(CompanyRolesRestApiClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiToCompanyRoleClientInterfaceMock = $this->getMockBuilder(CompanyRolesRestApiToCompanyRoleClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiFactory = new class (
            $this->restResourceBuilderInterfaceMock,
            $this->companyRolesRestApiClientMock
        ) extends CompanyRolesRestApiFactory {

            /**
             * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
             */
            protected $restResourceBuilder;

            /**
             * @var \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClient
             */
            protected $companyRolesRestApiClient;

            /**
             * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
             * @param \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClient $companyRolesRestApiClient
             */
            public function __construct(
                RestResourceBuilderInterface $restResourceBuilder,
                CompanyRolesRestApiClient $companyRolesRestApiClient
            ) {
                $this->restResourceBuilder = $restResourceBuilder;
                $this->companyRolesRestApiClient = $companyRolesRestApiClient;
            }

            /**
             * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
             */
            public function getResourceBuilder(): RestResourceBuilderInterface
            {
                return $this->restResourceBuilder;
            }

            /**
             * @return \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClient
             */
            public function getClient(): CompanyRolesRestApiClient
            {
                return $this->companyRolesRestApiClient;
            }
        };
        $this->companyRolesRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCompanyRoleReader(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyRolesRestApiDependencyProvider::CLIENT_COMPANY_ROLE)
            ->willReturn($this->companyRolesRestApiToCompanyRoleClientInterfaceMock);

        $this->assertInstanceOf(
            CompanyRoleReaderInterface::class,
            $this->companyRolesRestApiFactory->createCompanyRoleReader()
        );
    }
}
