<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Persistence;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;

interface CompanyRolesRestApiRepositoryInterface
{
    /**
     * @param string $idCustomer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRoleCollectionByIdCustomer(string $idCustomer): CompanyRoleCollectionTransfer;
}
