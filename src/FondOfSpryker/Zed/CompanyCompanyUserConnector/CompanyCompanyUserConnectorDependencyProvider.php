<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector;

use FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade\CompanyCompanyUserConnectorToCompanyFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CompanyCompanyUserConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_COMPANY = 'FACADE_COMPANY';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addCompanyFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyFacade(Container $container): Container
    {
        $container[static::FACADE_COMPANY] = function (Container $container) {
            return new CompanyCompanyUserConnectorToCompanyFacadeBridge(
                $container->getLocator()->company()->facade()
            );
        };

        return $container;
    }
}
