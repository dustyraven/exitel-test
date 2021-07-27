<?php declare(strict_types=1);

namespace DataSource;

use InvalidArgumentException;

class DataSource
{
    public function getAddress(): string
    {
        $address = $_REQUEST['address'] ?? false;

        if (!$address) {
            throw new InvalidArgumentException('Undefined address.');
        }

        return $address;
    }
}
