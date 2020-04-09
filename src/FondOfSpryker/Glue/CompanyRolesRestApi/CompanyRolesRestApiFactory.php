<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi;

use FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleMapper;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleMapperInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleReader;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleReaderInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiError;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiErrorInterface;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClientInterface getClient()
 */
class CompanyRolesRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleReaderInterface
     */
    public function createCompanyRoleReader(): CompanyRoleReaderInterface
    {
        return new CompanyRoleReader(
            $this->getResourceBuilder(),
            $this->createCompanyRoleMapper(),
            $this->getCompanyRoleClient(),
            $this->createRestApiError(),
            $this->getClient()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleMapperInterface
     */
    protected function createCompanyRoleMapper(): CompanyRoleMapperInterface
    {
        return new CompanyRoleMapper();
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected function createRestApiError(): RestApiErrorInterface
    {
        return new RestApiError();
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientInterface
     */
    protected function getCompanyRoleClient(): CompanyRolesRestApiToCompanyRoleClientInterface
    {
        return $this->getProvidedDependency(CompanyRolesRestApiDependencyProvider::CLIENT_COMPANY_ROLE);
    }
}
