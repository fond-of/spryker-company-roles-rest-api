<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReaderInterface;
use FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepository;

class CompanyRolesRestApiBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiBusinessFactory
     */
    protected $companyRolesRestApiBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepository
     */
    protected $companyRolesRestApiRepositoryMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyRolesRestApiRepositoryMock = $this->getMockBuilder(CompanyRolesRestApiRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesRestApiBusinessFactory = new CompanyRolesRestApiBusinessFactory();
        $this->companyRolesRestApiBusinessFactory->setRepository($this->companyRolesRestApiRepositoryMock);
    }

    /**
     * @return void
     */
    public function testCreateCompanyRoleReader(): void
    {
        $this->assertInstanceOf(
            CompanyRoleReaderInterface::class,
            $this->companyRolesRestApiBusinessFactory->createCompanyRoleReader()
        );
    }
}
