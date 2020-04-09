<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business;

use FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReader;
use FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface getRepository()
 */
class CompanyRolesRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReaderInterface
     */
    public function createCompanyRoleReader(): CompanyRoleReaderInterface
    {
        return new CompanyRoleReader(
            $this->getRepository()
        );
    }
}
