<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector\Business;

use FondOfSpryker\Zed\CompanyCompanyUserConnector\Business\Hydrator\CompanyUserHydrator;
use FondOfSpryker\Zed\CompanyCompanyUserConnector\Business\Hydrator\CompanyUserHydratorInterface;
use FondOfSpryker\Zed\CompanyCompanyUserConnector\CompanyCompanyUserConnectorDependencyProvider;
use FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade\CompanyCompanyUserConnectorToCompanyFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class CompanyCompanyUserConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CompanyCompanyUserConnector\Business\Hydrator\CompanyUserHydratorInterface
     */
    public function createCompanyUserHydrator(): CompanyUserHydratorInterface
    {
        return new CompanyUserHydrator($this->getCompanyFacade());
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade\CompanyCompanyUserConnectorToCompanyFacadeInterface
     */
    protected function getCompanyFacade(): CompanyCompanyUserConnectorToCompanyFacadeInterface
    {
        return $this->getProvidedDependency(CompanyCompanyUserConnectorDependencyProvider::FACADE_COMPANY);
    }
}
