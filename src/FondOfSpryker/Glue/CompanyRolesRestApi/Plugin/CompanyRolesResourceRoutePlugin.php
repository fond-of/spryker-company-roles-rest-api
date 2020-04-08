<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Plugin;

use FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiConfig;
use Generated\Shared\Transfer\RestCompanyRoleAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

class CompanyRolesResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(
        ResourceRouteCollectionInterface $resourceRouteCollection
    ): ResourceRouteCollectionInterface {
        $resourceRouteCollection
            ->addGet(CompanyRolesRestApiConfig::ACTION_COMPANY_ROLES_GET, true);

        return $resourceRouteCollection;
    }

    /**
     * @return string
     */
    public function getResourceType(): string
    {
        return CompanyRolesRestApiConfig::RESOURCE_COMPANY_ROLES;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return CompanyRolesRestApiConfig::CONTROLLER_COMPANY_ROLES;
    }

    /**
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestCompanyRoleAttributesTransfer::class;
    }
}
