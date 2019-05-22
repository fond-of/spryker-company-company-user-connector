<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector\Business;

use Generated\Shared\Transfer\CompanyUserTransfer;

interface CompanyCompanyUserConnectorFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrateCompanyUser(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer;
}
