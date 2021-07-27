<?php declare(strict_types=1);

namespace Provider;

class OpenStreetMap extends Provider
{
    public function __construct()
    {
        $this->providerURL = 'https://nominatim.openstreetmap.org/search?q={ADDRESS}&format=json';
    }

    public function extractLatLng($data): array
    {
        $data = json_decode($data, true)[0];

        $result = [
            'provider' => 'Open Street Map',
            'latitude' => (float)($data['lat'] ?? 0),
            'longitude' => (float)($data['lon'] ?? 0),
            'error' => $data ? '' : 'No data',
        ];

        return $result;

    }
}
