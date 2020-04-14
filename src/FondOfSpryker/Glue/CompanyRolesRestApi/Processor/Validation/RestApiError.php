<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation;

use FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiConfig;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class RestApiError implements RestApiErrorInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addCompanyRoleUuidMissingError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorMessageTransfer = (new RestErrorMessageTransfer())
            ->setCode(CompanyRolesRestApiConfig::RESPONSE_CODE_UUID_MISSING)
            ->setStatus(Response::HTTP_BAD_REQUEST)
            ->setDetail(CompanyRolesRestApiConfig::RESPONSE_DETAIL_UUID_MISSING);

        return $restResponse->addError($restErrorMessageTransfer);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addCompanyRoleNotFoundError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorMessageTransfer = (new RestErrorMessageTransfer())
            ->setCode(CompanyRolesRestApiConfig::RESPONSE_CODE_COMPANY_ROLE_NOT_FOUND)
            ->setStatus(Response::HTTP_BAD_REQUEST)
            ->setDetail(CompanyRolesRestApiConfig::RESPONSE_DETAILS_COMPANY_ROLE_NOT_FOUND);

        return $restResponse->addError($restErrorMessageTransfer);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addCompanyRoleNoPermissionError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorMessageTransfer = (new RestErrorMessageTransfer())
            ->setCode(CompanyRolesRestApiConfig::RESPONSE_CODE_NO_PERMISSION)
            ->setStatus(Response::HTTP_BAD_REQUEST)
            ->setDetail(CompanyRolesRestApiConfig::RESPONSE_DETAILS_NO_PERMISSION);

        return $restResponse->addError($restErrorMessageTransfer);
    }
}
