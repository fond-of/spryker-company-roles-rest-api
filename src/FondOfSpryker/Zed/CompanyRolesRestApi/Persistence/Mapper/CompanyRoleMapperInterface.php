<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\Mapper;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CompanyRoleTransfer;
use Generated\Shared\Transfer\SpyCompanyRoleEntityTransfer;

interface CompanyRoleMapperInterface
{
    /**
     * @param array $spyCompanyRoleEntityTransfers
     * @param \Generated\Shared\Transfer\CompanyRoleCollectionTransfer $companyRoleCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function mapEntityTransfersToTransfer(
        array $spyCompanyRoleEntityTransfers,
        CompanyRoleCollectionTransfer $companyRoleCollectionTransfer
    ): CompanyRoleCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\SpyCompanyRoleEntityTransfer $spyCompanyRoleEntityTransfer
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleTransfer
     */
    public function mapEntityTransferToTransfer(
        SpyCompanyRoleEntityTransfer $spyCompanyRoleEntityTransfer,
        CompanyRoleTransfer $companyRoleTransfer
    ): CompanyRoleTransfer;
}
