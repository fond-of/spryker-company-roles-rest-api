<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi;

use FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientBridge;
use FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyUserClientBridge;
use Spryker\Glue\Kernel\AbstractBundleDependencyProvider;
use Spryker\Glue\Kernel\Container;

class CompanyRolesRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_COMPANY_ROLE = 'CLIENT_COMPANY_ROLE';
    public const CLIENT_COMPANY_USER = 'CLIENT_COMPANY_USER';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = parent::provideDependencies($container);

        $container = $this->addCompanyRoleClient($container);
        $container = $this->addCompanyUserClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addCompanyRoleClient(Container $container): Container
    {
        $container[static::CLIENT_COMPANY_ROLE] = static function (Container $container) {
            return new CompanyRolesRestApiToCompanyRoleClientBridge(
                $container->getLocator()->companyRole()->client()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addCompanyUserClient(Container $container): Container
    {
        $container[static::CLIENT_COMPANY_USER] = static function (Container $container) {
            return new CompanyRolesRestApiToCompanyUserClientBridge(
                $container->getLocator()->companyUser()->client()
            );
        };

        return $container;
    }
}
