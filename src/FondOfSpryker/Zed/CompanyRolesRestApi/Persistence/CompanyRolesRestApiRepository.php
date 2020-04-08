<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Persistence;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiPersistenceFactory getFactory()
 */
class CompanyRolesRestApiRepository extends AbstractRepository implements CompanyRolesRestApiRepositoryInterface
{
    /**
     * @param string $idCustomer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRolesByIdCustomer(string $idCustomer): CompanyRoleCollectionTransfer
    {
        $companyRoleEntity = $this->getFactory()
            ->createCompanyRoleQuery()
            ->joinWithSpyCompanyRoleToCompanyUser()
                ->useCompanyQuery()
                ->filterByIsActive(true)
                ->joinWithCompanyUser()
                    ->useCompanyUserQuery()
                    ->filterByIsActive(true)
                    ->joinWithCustomer()
                        ->useCustomerQuery()
                        ->filterByIdCustomer($idCustomer)
                    ->endUse()
                ->endUse()
            ->endUse();

        $spyCompanyRoleEntityTransfers = $this->buildQueryFromCriteria($companyRoleEntity)->find();

        return $this->getFactory()
            ->createCompanyRoleMapper()
            ->mapEntityTransfersToTransfer($spyCompanyRoleEntityTransfers, new CompanyRoleCollectionTransfer());
    }
}
