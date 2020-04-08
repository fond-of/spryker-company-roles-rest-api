<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business;

use FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReader;
use FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface getRepository()
 */
class CompanyRolesRestApiBusinessFactory extends AbstractFacade
{
    /**
     * @return \FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader\CompanyRoleReaderInterface
     */
    public function createCompanyRolesReader(): CompanyRoleReaderInterface
    {
        return new CompanyRoleReader(
            $this->getRepository()
        );
    }
}
