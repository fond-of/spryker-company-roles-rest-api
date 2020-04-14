<?php

namespace FondOfSpryker\Zed\CompanyRolesRestApi\Persistence;

use FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\Mapper\CompanyRoleMapper;
use FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\Mapper\CompanyRoleMapperInterface;
use Orm\Zed\CompanyRole\Persistence\SpyCompanyRoleQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\CompanyRolesRestApiRepositoryInterface getRepository()
 */
class CompanyRolesRestApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\CompanyRole\Persistence\SpyCompanyRoleQuery
     */
    public function createCompanyRoleQuery(): SpyCompanyRoleQuery
    {
        return new SpyCompanyRoleQuery();
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyRolesRestApi\Persistence\Mapper\CompanyRoleMapperInterface
     */
    public function createCompanyRoleMapper(): CompanyRoleMapperInterface
    {
        return new CompanyRoleMapper();
    }
}
