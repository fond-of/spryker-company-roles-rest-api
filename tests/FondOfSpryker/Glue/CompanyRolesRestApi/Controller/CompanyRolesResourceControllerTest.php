<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Controller;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiFactory;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleReaderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyRolesResourceControllerTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Controller\CompanyRolesResourceController
     */
    protected $companyRolesResourceController;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiFactory
     */
    protected $companyRolesRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleReaderInterface
     */
    protected $companyRoleReaderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleReaderInterface
     */
    protected $restResponseInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    protected $restResourceInterfaceMock;

    /**
     * @var string
     */
    protected $id;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiFactoryMock = $this->getMockBuilder(CompanyRolesRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleReaderInterfaceMock = $this->getMockBuilder(CompanyRoleReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResponseInterfaceMock = $this->getMockBuilder(RestResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResourceInterfaceMock = $this->getMockBuilder(RestResourceInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 'id';

        $this->companyRolesResourceController = new class (
            $this->companyRolesRestApiFactoryMock
        )extends CompanyRolesResourceController {

            /**
             * @var \FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiFactory
             */
            protected $companyRolesRestApiFactory;

            /**
             * @param \FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiFactory $companyRolesRestApiFactory
             */
            public function __construct(CompanyRolesRestApiFactory $companyRolesRestApiFactory)
            {
                $this->companyRolesRestApiFactory = $companyRolesRestApiFactory;
            }

            /**
             * @return \FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiFactory
             */
            public function getFactory(): CompanyRolesRestApiFactory
            {
                return $this->companyRolesRestApiFactory;
            }
        };
    }

    /**
     * @return void
     */
    public function testGetActionFindCompanyRoleByUuid(): void
    {
        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyRolesRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyRoleReader')
            ->willReturn($this->companyRoleReaderInterfaceMock);

        $this->companyRoleReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyRoleByUuid')
            ->with($this->restRequestInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyRolesResourceController->getAction(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetActionFindCompanyRoleCollectionByIdCustomer(): void
    {
        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn(null);

        $this->companyRolesRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyRoleReader')
            ->willReturn($this->companyRoleReaderInterfaceMock);

        $this->companyRoleReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyRoleCollectionByIdCustomer')
            ->with($this->restRequestInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyRolesResourceController->getAction(
                $this->restRequestInterfaceMock
            )
        );
    }
}
