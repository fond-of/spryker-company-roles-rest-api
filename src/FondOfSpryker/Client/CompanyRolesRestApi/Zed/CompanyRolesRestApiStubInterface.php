<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi\Zed;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface CompanyRolesRestApiStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRolesByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer;
}
