<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiFactory getFactory()
 */
class CompanyRolesRestApiClient extends AbstractClient implements CompanyRolesRestApiClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRoleCollectionByIdCustomer(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer
    {
        return $this->getFactory()
            ->createZedCompanyRolesRestApiStub()
            ->findCompanyRoleCollectionByIdCustomer($customerTransfer);
    }
}
