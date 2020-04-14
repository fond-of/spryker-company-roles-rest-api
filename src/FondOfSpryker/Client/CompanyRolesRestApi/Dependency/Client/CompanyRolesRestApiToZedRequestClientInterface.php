<?php

namespace FondOfSpryker\Client\CompanyRolesRestApi\Dependency\Client;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface CompanyRolesRestApiToZedRequestClientInterface
{
    /**
     * @param string $url
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $object
     * @param array|null $requestOptions
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function call(string $url, TransferInterface $object, $requestOptions = null): TransferInterface;
}
