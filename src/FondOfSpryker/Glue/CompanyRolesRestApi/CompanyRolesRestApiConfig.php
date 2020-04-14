<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi;

use Spryker\Glue\Kernel\AbstractBundleConfig;

class CompanyRolesRestApiConfig extends AbstractBundleConfig
{
    public const RESOURCE_COMPANY_ROLES = 'company-roles';
    public const CONTROLLER_COMPANY_ROLES = 'company-roles-resource';
    public const ACTION_COMPANY_ROLES_GET = 'get';

    public const RESPONSE_CODE_UUID_MISSING = '800';
    public const RESPONSE_DETAIL_UUID_MISSING = 'Uuid is missing.';

    public const RESPONSE_CODE_COMPANY_ROLE_NOT_FOUND = '801';
    public const RESPONSE_DETAILS_COMPANY_ROLE_NOT_FOUND = 'Company role not found.';

    public const RESPONSE_CODE_NO_PERMISSION = '802';
    public const RESPONSE_DETAILS_NO_PERMISSION = 'No permission to read company role.';
}
