<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector\Business\Hydrator;

use FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade\CompanyCompanyUserConnectorToCompanyFacadeInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;

class CompanyUserHydrator implements CompanyUserHydratorInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade\CompanyCompanyUserConnectorToCompanyFacadeInterface
     */
    protected $companyFacade;

    /**
     * @param \FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade\CompanyCompanyUserConnectorToCompanyFacadeInterface $companyFacade
     */
    public function __construct(CompanyCompanyUserConnectorToCompanyFacadeInterface $companyFacade)
    {
        $this->companyFacade = $companyFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrate(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        if ($companyUserTransfer->getFkCompany() === null) {
            return $companyUserTransfer;
        }

        $companyTransfer = new CompanyTransfer();
        $companyTransfer->setIdCompany($companyUserTransfer->getFkCompany());

        $companyTransfer = $this->companyFacade->getCompanyById($companyTransfer);

        $companyUserTransfer->setCompany($companyTransfer);

        return $companyUserTransfer;
    }
}
