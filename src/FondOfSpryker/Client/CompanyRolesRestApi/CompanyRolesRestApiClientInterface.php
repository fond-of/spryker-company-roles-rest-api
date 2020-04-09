<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

interface CompanyRolesRestApiClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRoleCollectionByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer;
}
