<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Communication\Controller;

use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\CompanyRolesRestApi\Business\CompanyRolesRestApiFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleCollectionTransfer
     */
    public function findCompanyRolesByIdCustomerAction(CustomerTransfer $customerTransfer): CompanyRoleCollectionTransfer
    {
        return $this->getFacade()->findCompanyRolesByIdCustomer($customerTransfer);
    }
}
