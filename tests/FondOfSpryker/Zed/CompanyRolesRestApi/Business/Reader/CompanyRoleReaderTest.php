<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyRoleReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReader
     */
    protected $companyRoleReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface
     */
    protected $companyRolesRestApiRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var int
     */
    protected $idCustomer;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    protected $companyRoleCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRolesRestApiRepositoryInterfaceMock = $this->getMockBuilder(CompanyRolesRestApiRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCustomer = 1;

        $this->companyRoleCollectionTransferMock = $this->getMockBuilder(CompanyRoleCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleReader = new CompanyRoleReader(
            $this->companyRolesRestApiRepositoryInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyRolesByIdCustomer(): void
    {
        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('requireIdCustomer')
            ->willReturnSelf();

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getIdCustomer')
            ->willReturn($this->idCustomer);

        $this->companyRolesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyRoleCollectionByIdCustomer')
            ->with($this->idCustomer)
            ->willReturn($this->companyRoleCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyRoleCollectionTransfer::class,
            $this->companyRoleReader->findCompanyRoleCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
