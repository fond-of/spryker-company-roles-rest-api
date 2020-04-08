<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Business\Reader;

use FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyRoleReader implements CompanyRoleReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface
     */
    protected $companyRolesRestApiRepository;

    /**
     * @param \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface $companyRolesRestApiRepository
     */
    public function __construct(CompanyRolesRestApiRepositoryInterface $companyRolesRestApiRepository)
    {
        $this->companyRolesRestApiRepository = $companyRolesRestApiRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRolesByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer
    {
        $customerTransfer->requireIdCustomer();

        return $this->companyRolesRestApiRepository->findCompanyRolesByIdCustomer($customerTransfer->getIdCustomer());
    }
}
