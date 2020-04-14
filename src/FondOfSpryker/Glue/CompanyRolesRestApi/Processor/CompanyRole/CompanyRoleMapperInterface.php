<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole;

use Generated\Shared\Transfer\CompanyRoleTransfer;
use Generated\Shared\Transfer\RestCompanyRoleAttributesTransfer;

interface CompanyRoleMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyRoleAttributesTransfer
     */
    public function mapRestCompanyRoleAttributesTransfer(
        CompanyRoleTransfer $companyRoleTransfer
    ): RestCompanyRoleAttributesTransfer;
}
