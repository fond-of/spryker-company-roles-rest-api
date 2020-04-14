<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyRoleResponseTransfer;
use Generated\Shared\Transfer\CompanyRoleTransfer;
use Spryker\Client\CompanyRole\CompanyRoleClientInterface;

class CompanyRolesRestApiToCompanyRoleClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientBridge
     */
    protected $companyRolesRestApiToCompanyRoleClientBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleTransfer
     */
    protected $companyRoleTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\CompanyRole\CompanyRoleClientInterface
     */
    protected $companyRoleClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleResponseTransfer
     */
    protected $companyRoleResponseTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRoleClientInterfaceMock = $this->getMockBuilder(CompanyRoleClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleTransferMock = $this->getMockBuilder(CompanyRoleTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleResponseTransferMock = $this->getMockBuilder(CompanyRoleResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiToCompanyRoleClientBridge = new CompanyRolesRestApiToCompanyRoleClientBridge(
            $this->companyRoleClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyRoleByUuid(): void
    {
        $this->companyRoleClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyRoleByUuid')
            ->with($this->companyRoleTransferMock)
            ->willReturn($this->companyRoleResponseTransferMock);

        $this->assertInstanceOf(
            CompanyRoleResponseTransfer::class,
            $this->companyRolesRestApiToCompanyRoleClientBridge->findCompanyRoleByUuid(
                $this->companyRoleTransferMock
            )
        );
    }
}
