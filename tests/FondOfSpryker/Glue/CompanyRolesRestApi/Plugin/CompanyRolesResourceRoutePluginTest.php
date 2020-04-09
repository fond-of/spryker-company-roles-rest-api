<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiConfig;
use Generated\Shared\Transfer\RestCompanyRoleAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;

class CompanyRolesResourceRoutePluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Plugin\CompanyRolesResourceRoutePlugin
     */
    protected $companyRolesResourceRoutePlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    protected $resourceRouteCollectionInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->resourceRouteCollectionInterfaceMock = $this->getMockBuilder(ResourceRouteCollectionInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyRolesResourceRoutePlugin = new CompanyRolesResourceRoutePlugin();
    }

    /**
     * @return void
     */
    public function testConfigure(): void
    {
        $this->resourceRouteCollectionInterfaceMock->expects($this->atLeastOnce())
            ->method('addGet')
            ->with(CompanyRolesRestApiConfig::ACTION_COMPANY_ROLES_GET, true)
            ->willReturnSelf();

        $this->assertInstanceOf(
            ResourceRouteCollectionInterface::class,
            $this->companyRolesResourceRoutePlugin->configure(
                $this->resourceRouteCollectionInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetResourceType(): void
    {
        $this->assertSame(
            CompanyRolesRestApiConfig::RESOURCE_COMPANY_ROLES,
            $this->companyRolesResourceRoutePlugin->getResourceType()
        );
    }

    /**
     * @return void
     */
    public function testGetController(): void
    {
        $this->assertSame(
            CompanyRolesRestApiConfig::CONTROLLER_COMPANY_ROLES,
            $this->companyRolesResourceRoutePlugin->getController()
        );
    }

    /**
     * @return void
     */
    public function testGetResourceAttributesClassName(): void
    {
        $this->assertSame(
            RestCompanyRoleAttributesTransfer::class,
            $this->companyRolesResourceRoutePlugin->getResourceAttributesClassName()
        );
    }
}
