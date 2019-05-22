<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector\Business\Hydrator;

use Generated\Shared\Transfer\CompanyUserTransfer;

interface CompanyUserHydratorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrate(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer;
}
