<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface CompanyRolesRestApiFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRolesByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer;
}
