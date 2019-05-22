<?php

namespace FondOfSpryker\Zed\CompanyCustomerConnector\Communication\Plugin\Customer;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Spryker\Zed\CompanyUserExtension\Dependency\Plugin\CompanyUserHydrationPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CompanyCompanyUserConnector\Business\CompanyCompanyUserConnectorFacade getFacade()
 */
class CompanyHydratePlugin extends AbstractPlugin implements CompanyUserHydrationPluginInterface
{
    /**
     * Specification:
     * - Hydrates a company user fields
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrate(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        return $this->getFacade()->hydrateCompanyUser($companyUserTransfer);
    }
}
