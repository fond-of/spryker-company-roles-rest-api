<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CompanyRoleCriteriaFilterTransfer;
use Generated\Shared\Transfer\CompanyRoleResponseTransfer;
use Generated\Shared\Transfer\CompanyRoleTransfer;

interface CompanyRolesRestApiToCompanyRoleClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleResponseTransfer
     */
    public function findCompanyRoleByUuid(
        CompanyRoleTransfer $companyRoleTransfer
    ): CompanyRoleResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\CompanyRoleCriteriaFilterTransfer $companyRoleCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function getCompanyRoleCollection(CompanyRoleCriteriaFilterTransfer $companyRoleCriteriaFilterTransfer): CompanyRoleCollectionTransfer;
}
