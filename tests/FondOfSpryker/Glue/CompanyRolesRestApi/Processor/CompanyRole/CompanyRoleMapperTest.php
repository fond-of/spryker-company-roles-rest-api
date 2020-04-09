<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyRoleTransfer;
use Generated\Shared\Transfer\RestCompanyRoleAttributesTransfer;

class CompanyRoleMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleMapper
     */
    protected $companyRoleMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyRoleTransfer
     */
    protected $companyRoleTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRoleTransferMock = $this->getMockBuilder(CompanyRoleTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRoleMapper = new CompanyRoleMapper();
    }

    /**
     * @return void
     */
    public function testMapRestCompanyRoleAttributesTransfer(): void
    {
        $this->companyRoleTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyRoleAttributesTransfer::class,
            $this->companyRoleMapper->mapRestCompanyRoleAttributesTransfer(
                $this->companyRoleTransferMock
            )
        );
    }
}
