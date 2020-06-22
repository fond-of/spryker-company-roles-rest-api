<?php

namespace FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole;

use FondOfSpryker\Glue\CompanyRolesRestApi\CompanyRolesRestApiConfig;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyRoleResourceRelationshipExpander implements CompanyRoleResourceRelationshipExpanderInterface
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
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Glue\CompanyRolesRestApi\Processor\CompanyRole\CompanyRoleMapperInterface $companyRoleMapper
     */
    public function __construct(
        RestResourceBuilderInterface $restResourceBuilder,
        CompanyRoleMapperInterface $companyRoleMapper
    ) {
        $this->restResourceBuilder = $restResourceBuilder;
        $this->companyRoleMapper = $companyRoleMapper;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface[] $resources
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface[]
     */
    public function addResourceRelationships(array $resources, RestRequestInterface $restRequest): array
    {
        foreach ($resources as $resource) {
            /**
             * @var \Generated\Shared\Transfer\CompanyUserTransfer|null $payload
             */
            $payload = $resource->getPayload();
            if ($payload === null || !($payload instanceof CompanyUserTransfer)) {
                continue;
            }

            $companyRoleCollectionTransfer = $payload->getCompanyRoleCollection();
            if ($companyRoleCollectionTransfer === null || count($companyRoleCollectionTransfer->getRoles()) === 0) {
                continue;
            }

            $this->addCompanyRoleRelationships($resource, $companyRoleCollectionTransfer);
        }

        return $resources;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface $resource
     * @param \Generated\Shared\Transfer\CompanyRoleCollectionTransfer $companyRoleCollectionTransfer
     *
     * @return void
     */
    protected function addCompanyRoleRelationships(
        RestResourceInterface $resource,
        CompanyRoleCollectionTransfer $companyRoleCollectionTransfer
    ): void {
        foreach ($companyRoleCollectionTransfer->getRoles() as $companyRoleTransfer) {
            $restCompanyRoleAttributesTransfer = $this->companyRoleMapper
                ->mapRestCompanyRoleAttributesTransfer(
                    $companyRoleTransfer,
                );

            $companyRoleResource = $this->restResourceBuilder->createRestResource(
                CompanyRolesRestApiConfig::RESOURCE_COMPANY_ROLES,
                $companyRoleTransfer->getUuid(),
                $restCompanyRoleAttributesTransfer
            );

            $resource->addRelationship($companyRoleResource);
        }
    }
}
