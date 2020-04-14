<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiBusinessFactory getFactory()
 */
class CompanyRolesRestApiFacade extends AbstractFacade implements CompanyRolesRestApiFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRoleCollectionByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer
    {
        return $this->getFactory()
            ->createCompanyRoleReader()
            ->findCompanyRoleCollectionByIdCustomer($customerTransfer);
    }
}
