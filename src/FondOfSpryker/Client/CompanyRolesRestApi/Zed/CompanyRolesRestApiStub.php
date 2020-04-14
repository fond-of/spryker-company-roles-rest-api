<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi\Zed;

use FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyRolesRestApiStub implements CompanyRolesRestApiStubInterface
{
    /**
     * @var \FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(CompanyRolesRestApiToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRoleCollectionByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyRoleCollectionTransfer $companyRoleCollectionTransfer */
        $companyRoleCollectionTransfer = $this->zedRequestClient->call('/company-roles-rest-api/gateway/find-company-role-collection-by-id-customer', $customerTransfer);

        return $companyRoleCollectionTransfer;
    }
}
