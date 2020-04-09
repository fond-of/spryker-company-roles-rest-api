<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyRolesRestApi\Zed\CompanyRolesRestApiStubInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyRolesRestApiClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClient
     */
    protected $companyRolesRestApiClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiFactory
     */
    protected $companyRolesRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyRolesRestApi\Zed\CompanyRolesRestApiStubInterface
     */
    protected $companyRolesRestApiStubInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    protected $companyRoleCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRolesRestApiFactoryMock = $this->getMockBuilder(CompanyRolesRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiStubInterfaceMock = $this->getMockBuilder(CompanyRolesRestApiStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleCollectionTransferMock = $this->getMockBuilder(CompanyRoleCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiClient = new CompanyRolesRestApiClient();
        $this->companyRolesRestApiClient->setFactory($this->companyRolesRestApiFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindCompanyRoleCollectionByIdCustomer(): void
    {
        $this->companyRolesRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyRolesRestApiStub')
            ->willReturn($this->companyRolesRestApiStubInterfaceMock);

        $this->companyRolesRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyRoleCollectionByIdCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->companyRoleCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyRoleCollectionTransfer::class,
            $this->companyRolesRestApiClient->findCompanyRoleCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
