<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade;

use Generated\Shared\Transfer\CompanyTransfer;

interface CompanyCompanyUserConnectorToCompanyFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyTransfer $companyTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function getCompanyById(CompanyTransfer $companyTransfer): CompanyTransfer;
}
