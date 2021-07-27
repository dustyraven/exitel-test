<?php declare(strict_types=1);

namespace Tests;

use DataSource\DataSource;
use Geocode\Geocode;
use Provider\Provider;
use PHPUnit\Framework\TestCase;
use Mockery;

final class GeocodeTest extends TestCase
{
    /**
     * @var DataSource|Mockery\MockInterface
     */
    private $dataSource;

    /**
     * @var Provider|Mockery\MockInterface
     */
    private $provider;


    public function setUp()
    {
        parent::setUp();

        /** @var DataSource|Mockery\MockInterface */
        $this->dataSource = Mockery::mock(DataSource::class);
        /** @var Provider|Mockery\MockInterface */
        $this->provider = Mockery::mock(Provider::class);
    }

    public function tearDown()
    {
        $this->dataSource = null;
        $this->provider   = null;

        parent::tearDown();
    }

    public function testGetGeocode()
    {
        $this->dataSource->shouldReceive('getAddress')
            ->andReturn('Foo');
        $this->provider->shouldReceive('composeURL')
            ->andReturn('Foo');
        $this->provider->shouldReceive('getData')
            ->andReturn('Foo');
        $this->provider->shouldReceive('extractLatLng')
            ->andReturn(['Bar']);

        $this->assertSame(['Bar'], (new Geocode($this->dataSource, $this->provider))->getGeocode());
    }
}
