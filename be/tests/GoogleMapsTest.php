<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Provider\GoogleMaps;

final class GoogleMapsTest extends TestCase
{
    public function testComposeURL()
    {
        $address = 'Foo bar';
        $expected = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=XXXXX';

        $this->assertSame($expected, (new GoogleMaps)->composeURL($address));
    }

    public function testGetData()
    {
        $url = (new GoogleMaps)->composeURL('Foo');
        $expected = file_get_contents(__DIR__ . '/fixtures/GoogleMaps.json');

        $this->assertEquals($expected, (new GoogleMaps)->getData($url));
    }
}
