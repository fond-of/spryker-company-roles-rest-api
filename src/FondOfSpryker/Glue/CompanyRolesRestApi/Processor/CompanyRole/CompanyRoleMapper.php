<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole;

use Generated\Shared\Transfer\CompanyRoleTransfer;
use Generated\Shared\Transfer\RestCompanyRoleAttributesTransfer;

class CompanyRoleMapper implements CompanyRoleMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyRoleAttributesTransfer
     */
    public function mapRestCompanyRoleAttributesTransfer(CompanyRoleTransfer $companyRoleTransfer): RestCompanyRoleAttributesTransfer
    {
        return (new RestCompanyRoleAttributesTransfer())->fromArray($companyRoleTransfer->toArray(), true);
    }
}
