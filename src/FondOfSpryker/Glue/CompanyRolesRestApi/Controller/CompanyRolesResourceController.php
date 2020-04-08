<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Controller;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiFactory getFactory()
 */
class CompanyRolesResourceController extends AbstractController
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        if ($restRequest->getResource()->getId()) {
            return $this->getFactory()
                ->createCompanyRoleReader()
                ->findCompanyRoleByUuid($restRequest);
        }

        return $this->getFactory()
            ->createCompanyRoleReader()
            ->findCompanyRolesByIdCustomer($restRequest);
    }
}
