<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi;

use FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\CompanyRolesRestApi\Zed\CompanyRolesRestApiStub;
use FondOfSpryker\Client\CompanyRolesRestApi\Zed\CompanyRolesRestApiStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class CompanyRolesRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\CompanyRolesRestApi\Zed\CompanyRolesRestApiStubInterface
     */
    public function createZedCompanyRolesRestApiStub(): CompanyRolesRestApiStubInterface
    {
        return new CompanyRolesRestApiStub(
            $this->getZedRequestClient()
        );
    }

    /**
     * @return \FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface
     */
    protected function getZedRequestClient(): CompanyRolesRestApiToZedRequestClientInterface
    {
        return $this->getProvidedDependency(CompanyRolesRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
