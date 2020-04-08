<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation;

use Generated\Shared\Transfer\CompanyRoleTransfer;

class RestApiValidator implements RestApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return bool
     */
    public function isCompanyRoleAssignedToCompanyUser(
        CompanyRoleTransfer $companyRoleTransfer
    ): bool {
        if ($companyRoleTransfer->getCompanyUserCollection() === null) {
            return false;
        }

        $companyUserTransfers = $companyRoleTransfer->getCompanyUserCollection()->getCompanyUsers();

        foreach ($companyUserTransfers as $companyUserTransfer) {
            if ($companyUserTransfer->getCompanyRoleCollection() === null) {
                continue;
            }

            $companyRoleTransfers = $companyUserTransfer->getCompanyRoleCollection()->getRoles();

            foreach ($companyRoleTransfers as $companyRole) {
                if ($companyRole->getUuid() === $companyRoleTransfer->getUuid()) {
                    return true;
                }
            }
        }

        return false;
    }
}
