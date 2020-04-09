<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReaderInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyRolesRestApiFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacade
     */
    protected $companyRolesRestApiFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiBusinessFactory
     */
    protected $companyRolesRestApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReaderInterface
     */
    protected $companyRoleReaderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    protected $companyRoleCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRolesRestApiBusinessFactoryMock = $this->getMockBuilder(CompanyRolesRestApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleReaderInterfaceMock = $this->getMockBuilder(CompanyRoleReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleCollectionTransferMock = $this->getMockBuilder(CompanyRoleCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiFacade = new CompanyRolesRestApiFacade();
        $this->companyRolesRestApiFacade->setFactory($this->companyRolesRestApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindCompanyRoleCollectionByIdCustomer(): void
    {
        $this->companyRolesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyRoleReader')
            ->willReturn($this->companyRoleReaderInterfaceMock);

        $this->companyRoleReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyRoleCollectionByIdCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->companyRoleCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyRoleCollectionTransfer::class,
            $this->companyRolesRestApiFacade->findCompanyRoleCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
