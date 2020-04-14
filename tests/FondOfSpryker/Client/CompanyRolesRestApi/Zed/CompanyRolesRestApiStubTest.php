<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyRolesRestApiStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyRolesRestApi\Zed\CompanyRolesRestApiStub
     */
    protected $companyRolesRestApiStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface
     */
    protected $companyRolesRestApiToZedRequestClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    protected $companyRoleCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRolesRestApiToZedRequestClientInterfaceMock = $this->getMockBuilder(CompanyRolesRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->url = '/company-roles-rest-api/gateway/find-company-role-collection-by-id-customer';

        $this->companyRoleCollectionTransferMock = $this->getMockBuilder(CompanyRoleCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiStub = new CompanyRolesRestApiStub(
            $this->companyRolesRestApiToZedRequestClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyRolesByIdCustomer(): void
    {
        $this->companyRolesRestApiToZedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->url, $this->customerTransferMock)
            ->willReturn($this->companyRoleCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyRoleCollectionTransfer::class,
            $this->companyRolesRestApiStub->findCompanyRoleCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
