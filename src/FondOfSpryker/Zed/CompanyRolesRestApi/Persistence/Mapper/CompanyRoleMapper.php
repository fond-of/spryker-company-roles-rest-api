<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\Mapper;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CompanyRoleTransfer;
use Generated\Shared\Transfer\SpyCompanyRoleEntityTransfer;

class CompanyRoleMapper implements CompanyRoleMapperInterface
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
    ): CompanyRoleCollectionTransfer {
        foreach ($spyCompanyRoleEntityTransfers as $spyCompanyRoleEntityTransfer) {
            $companyRoleTransfer = new CompanyRoleTransfer();
            $companyRoleTransfer = $this->mapEntityTransferToTransfer($spyCompanyRoleEntityTransfer, $companyRoleTransfer);

            $companyRoleCollectionTransfer->addRole($companyRoleTransfer);
        }

        return $companyRoleCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\SpyCompanyRoleEntityTransfer $spyCompanyRoleEntityTransfer
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleTransfer
     */
    public function mapEntityTransferToTransfer(
        SpyCompanyRoleEntityTransfer $spyCompanyRoleEntityTransfer,
        CompanyRoleTransfer $companyRoleTransfer
    ): CompanyRoleTransfer {
        return $companyRoleTransfer->fromArray($spyCompanyRoleEntityTransfer->toArray(), true);
    }
}
