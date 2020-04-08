<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation;

use Generated\Shared\Transfer\CompanyRoleTransfer;

interface RestApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return bool
     */
    public function isCompanyRoleAssignedToCompanyUser(
        CompanyRoleTransfer $companyRoleTransfer
    ): bool;
}
