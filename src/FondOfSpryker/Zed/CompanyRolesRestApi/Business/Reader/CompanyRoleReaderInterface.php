<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface CompanyRoleReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRolesByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer;
}
