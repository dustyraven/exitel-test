<?php declare(strict_types=1);

namespace Geocode;

use DataSource\DataSource;
use Provider\Provider;

class Geocode
{
    /**
     * @var DataSource $dataSource
     */
    private $dataSource;

    /**
     * @var Provider $provider
     */
    private $provider;

    /**
     * @param DataSource $dataSource
     * @param Provider $provider
     */
    public function __construct(DataSource $dataSource, Provider $provider)
    {
        $this->dataSource = $dataSource;
        $this->provider = $provider;
    }

    /**
     * @return array
     */
    public function getGeocode()
    {
        $address = $this->dataSource->getAddress();
        $url = $this->provider->composeURL($address);
        $data = $this->provider->getData($url);
        $geocode = $this->provider->extractLatLng($data);
        return $geocode;
    }
}
