<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Provider\OpenStreetMap;

final class OpenStreetMapTest extends TestCase
{
    public function testComposeURL()
    {
        $address = 'Foo bar';
        $expected = 'https://nominatim.openstreetmap.org/search?q=' . urlencode($address) . '&format=json';

        $this->assertSame($expected, (new OpenStreetMap)->composeURL($address));
    }

    public function testGetData()
    {
        $url = (new OpenStreetMap)->composeURL('1qa2ws');
        $expected = file_get_contents(__DIR__ . '/fixtures/OpenStreetMap.json');

        $this->assertEquals($expected, (new OpenStreetMap)->getData($url));
    }
}
