<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Communication\Controller;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacade;
use FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class GatewayControllerTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyRolesRestApi\Communication\Controller\GatewayController
     */
    protected $gatewayController;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacade
     */
    protected $companyRolesRestApiFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    protected $companyRoleCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRolesRestApiFacadeMock = $this->getMockBuilder(CompanyRolesRestApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleCollectionTransferMock = $this->getMockBuilder(CompanyRoleCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->gatewayController = new class (
            $this->companyRolesRestApiFacadeMock
        ) extends GatewayController {
            /**
             * @var \FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacadeInterface
             */
            protected $companyRolesRestApiFacade;

            /**
             * @param \FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacadeInterface $companyRolesRestApiFacade
             */
            public function __construct(CompanyRolesRestApiFacadeInterface $companyRolesRestApiFacade)
            {
                $this->companyRolesRestApiFacade = $companyRolesRestApiFacade;
            }

            /**
             * @return \FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacadeInterface
             */
            public function getFacade(): CompanyRolesRestApiFacadeInterface
            {
                return $this->companyRolesRestApiFacade;
            }
        };
    }

    /**
     * @return void
     */
    public function testFindCompanyRoleCollectionByIdCustomerAction(): void
    {
        $this->companyRolesRestApiFacadeMock->expects($this->atLeastOnce())
            ->method('findCompanyRoleCollectionByIdCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->companyRoleCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyRoleCollectionTransfer::class,
            $this->gatewayController->findCompanyRoleCollectionByIdCustomerAction(
                $this->customerTransferMock
            )
        );
    }
}
