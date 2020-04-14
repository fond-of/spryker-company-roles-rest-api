<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client;

use Generated\Shared\Transfer\CompanyRoleResponseTransfer;
use Generated\Shared\Transfer\CompanyRoleTransfer;
use Spryker\Client\CompanyRole\CompanyRoleClientInterface;

class CompanyRolesRestApiToCompanyRoleClientBridge implements CompanyRolesRestApiToCompanyRoleClientInterface
{
    /**
     * @var \Spryker\Client\CompanyRole\CompanyRoleClientInterface
     */
    protected $companyRoleClient;

    /**
     * @param \Spryker\Client\CompanyRole\CompanyRoleClientInterface $companyRoleClient
     */
    public function __construct(CompanyRoleClientInterface $companyRoleClient)
    {
        $this->companyRoleClient = $companyRoleClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleResponseTransfer
     */
    public function findCompanyRoleByUuid(
        CompanyRoleTransfer $companyRoleTransfer
    ): CompanyRoleResponseTransfer {
        return $this->companyRoleClient->findCompanyRoleByUuid($companyRoleTransfer);
    }
}
