<?php declare(strict_types=1);

namespace Tests;

use DataSource\DataSource;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class DataSourceTest extends TestCase
{
    public function tearDown()
    {
        unset($_REQUEST['address']);
    }

    public function testGetAddress()
    {
        $mockAddress = 'Foo';
        $_REQUEST['address'] = $mockAddress;

        $this->assertSame($mockAddress, (new DataSource)->getAddress());
    }

    public function testNoAddress()
    {
        $this->expectException(InvalidArgumentException::class);
        (new DataSource)->getAddress();
    }
}
