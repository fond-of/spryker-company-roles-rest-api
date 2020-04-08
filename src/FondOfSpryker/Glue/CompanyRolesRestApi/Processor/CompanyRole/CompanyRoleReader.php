<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole;

use FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClientInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiConfig;
use FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyUserClientInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiValidatorInterface;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CompanyRoleTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestUserTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyRoleReader implements CompanyRoleReaderInterface
{
    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleMapperInterface
     */
    protected $companyRoleMapper;

    /**
     * @var \Spryker\Client\CompanyRole\CompanyRoleClientInterface
     */
    protected $companyRoleClient;

    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiValidatorInterface
     */
    protected $restApiValidator;

    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $restApiError;

    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyUserClientInterface
     */
    protected $companyUserClient;

    /**
     * @var \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRolesRestApiClientInterface
     */
    protected $companyRolesRestApiClient;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleMapperInterface $companyRoleMapper
     * @param \FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyRoleClientInterface $companyRoleClient
     * @param \FondOfSpryker\Glue\CompanyRolesRestApi\Dependency\Client\CompanyRolesRestApiToCompanyUserClientInterface $companyUserClient
     * @param \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiValidatorInterface $restApiValidator
     * @param \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\Validation\RestApiErrorInterface $restApiError
     * @param \FondOfSpryker\Client\CompanyRolesRestApi\CompanyRolesRestApiClientInterface $companyRolesRestApiClient
     */
    public function __construct(
        RestResourceBuilderInterface $restResourceBuilder,
        CompanyRoleMapperInterface $companyRoleMapper,
        CompanyRolesRestApiToCompanyRoleClientInterface $companyRoleClient,
        CompanyRolesRestApiToCompanyUserClientInterface $companyUserClient,
        RestApiValidatorInterface $restApiValidator,
        RestApiErrorInterface $restApiError,
        CompanyRolesRestApiClientInterface $companyRolesRestApiClient
    ) {
        $this->restResourceBuilder = $restResourceBuilder;
        $this->companyRoleMapper = $companyRoleMapper;
        $this->companyRoleClient = $companyRoleClient;
        $this->companyUserClient = $companyUserClient;
        $this->restApiValidator = $restApiValidator;
        $this->restApiError = $restApiError;
        $this->companyRolesRestApiClient = $companyRolesRestApiClient;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function findCompanyRoleByUuid(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        if (!$restRequest->getResource()->getId()) {
            return $this->restApiError->addCompanyRoleUuidMissingError($restResponse);
        }

        $companyRoleTransfer = (new CompanyRoleTransfer())
            ->setUuid($restRequest->getResource()->getId());

        $companyRoleResponseTransfer = $this->companyRoleClient->findCompanyRoleByUuid($companyRoleTransfer);

        if (!$companyRoleResponseTransfer->getIsSuccessful()) {
            return $this->restApiError->addCompanyRoleNotFoundError($restResponse);
        }

        if (!$this->isCompanyRoleAssignedToRestUser($companyRoleTransfer, $restRequest->getRestUser())) {
            return $this->restApiError->addCompanyRoleNoPermissionError($restResponse);
        }

        return $this->createCompanyRoleResponse($companyRoleResponseTransfer->getCompanyRoleTransfer(), $restResponse);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     *
     * @return bool
     */
    protected function isCompanyRoleAssignedToRestUser(CompanyRoleTransfer $companyRoleTransfer, RestUserTransfer $restUserTransfer): bool
    {
        $customerTransfer = (new CustomerTransfer())
            ->setIdCustomer($restUserTransfer->getSurrogateIdentifier());

        $companyRoleCollectionTransfer = $this->companyRolesRestApiClient->findCompanyRolesByIdCustomer($customerTransfer);

        foreach ($companyRoleCollectionTransfer->getRoles() as $companyRole) {
            if ($companyRole->getUuid() === $companyRoleTransfer->getUuid()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function findCompanyRolesByIdCustomer(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $customerTransfer = (new CustomerTransfer())
            ->setIdCustomer($restRequest->getRestUser()->getSurrogateIdentifier());

        $companyRolesTransferMock = $this->companyRolesRestApiClient->findCompanyRolesByIdCustomer($customerTransfer);

        if ($companyRolesTransferMock->getRoles()->count() === 0) {
            return $this->restApiError->addCompanyRoleNotFoundError($restResponse);
        }

        return $this->createCompanyRoleCollectionResponse($companyRolesTransferMock, $restResponse);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyRoleCollectionTransfer $companyRoleCollectionTransfer
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createCompanyRoleCollectionResponse(
        CompanyRoleCollectionTransfer $companyRoleCollectionTransfer,
        RestResponseInterface $restResponse
    ): RestResponseInterface {
        foreach ($companyRoleCollectionTransfer->getRoles() as $companyRoleTransfer) {
            $this->createCompanyRoleResponse($companyRoleTransfer, $restResponse);
        }

        return $restResponse;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createCompanyRoleResponse(
        CompanyRoleTransfer $companyRoleTransfer,
        RestResponseInterface $restResponse
    ): RestResponseInterface {
        $restCompanyRoleAttributeTransfer = $this->companyRoleMapper
            ->mapRestCompanyRoleAttributesTransfer(
                $companyRoleTransfer
            );

        $restResource = $this->restResourceBuilder->createRestResource(
            CompanyRolesRestApiConfig::RESOURCE_COMPANY_ROLES,
            $companyRoleTransfer->getUuid(),
            $restCompanyRoleAttributeTransfer
        );

        return $restResponse->addResource($restResource);
    }
}
