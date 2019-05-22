<?php

namespace FondOfSpryker\Zed\CompanyCompanyUserConnector;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyCompanyUserConnector\Dependency\Facade\CompanyCompanyUserConnectorToCompanyFacadeBridge;
use Spryker\Shared\Kernel\BundleProxy;
use Spryker\Zed\Company\Business\CompanyFacadeInterface;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Kernel\Locator;

class CompanyCompanyUserConnectorDependencyProviderTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Locator|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $locatorMock;

    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $containerMock;

    /**
     * @var \Spryker\Shared\Kernel\BundleProxy|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $bundleProxyMock;

    /**
     * @var \Spryker\Zed\Company\Business\CompanyFacadeInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $companyFacadeMock;

    /**
     * @var \FondOfSpryker\Zed\CompanyCompanyUserConnector\CompanyCompanyUserConnectorDependencyProvider
     */
    protected $companyCompanyUserConnectorDependencyProvider;

    /**
     * @return void
     */
    protected function _before()
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->setMethodsExcept(['factory', 'set', 'offsetSet', 'get', 'offsetGet'])
            ->getMock();

        $this->locatorMock = $this->getMockBuilder(Locator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->bundleProxyMock = $this->getMockBuilder(BundleProxy::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyFacadeMock = $this->getMockBuilder(CompanyFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyCompanyUserConnectorDependencyProvider = new CompanyCompanyUserConnectorDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('getLocator')
            ->willReturn($this->locatorMock);

        $this->locatorMock->expects($this->atLeastOnce())
            ->method('__call')
            ->with('company')
            ->willReturn($this->bundleProxyMock);

        $this->bundleProxyMock->expects($this->atLeastOnce())
            ->method('__call')
            ->with('facade')
            ->willReturn($this->companyFacadeMock);

        $this->assertEquals(
            $this->containerMock,
            $this->companyCompanyUserConnectorDependencyProvider->provideBusinessLayerDependencies($this->containerMock)
        );

        $this->assertInstanceOf(
            CompanyCompanyUserConnectorToCompanyFacadeBridge::class,
            $this->containerMock[CompanyCompanyUserConnectorDependencyProvider::FACADE_COMPANY]
        );
    }
}
