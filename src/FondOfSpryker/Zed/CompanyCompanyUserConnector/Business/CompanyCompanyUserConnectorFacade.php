<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector\Business;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CompanyCompanyUserConnector\Business\CompanyCompanyUserConnectorBusinessFactory getFactory()
 */
class CompanyCompanyUserConnectorFacade extends AbstractFacade implements CompanyCompanyUserConnectorFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrateCompanyUser(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        return $this->getFactory()->createCompanyUserHydrator()->hydrate($companyUserTransfer);
    }
}
