<?php declare(strict_types=1);

namespace Provider;

class GoogleMaps extends Provider
{
    public function __construct()
    {
        $this->providerURL = 'https://maps.googleapis.com/maps/api/geocode/json?address={ADDRESS}&key={KEY}';
        $this->providerKey = 'XXXXX';
    }

    public function extractLatLng($data): array
    {
        $data = json_decode($data, true)['results'][0]['geometry']['location'] ?? false;

        $result = [
            'provider' => 'Google Maps',
            'latitude' => $data['lat'] ?? 0,
            'longitude' => $data['lng'] ?? 0,
            'error' => $data ? '' : 'No data',
        ];

        return $result;
    }
}
