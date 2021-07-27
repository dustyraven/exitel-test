<?php declare(strict_types=1);

namespace Provider;

abstract class Provider
{
    /**
     * @var string $providerURL
     */
    protected $providerURL;

    /**
     * @var string $providerKey
     */
    protected $providerKey;

    public function composeURL(string $address): string
    {
        $address = urlencode($address);

        $url = str_replace('{ADDRESS}', $address, $this->providerURL);

        if ($this->providerKey) {
            $url = str_replace('{KEY}', $this->providerKey, $url);
        }

        return $url;
    }

    public function getData(string $url): string
    {
        // Mock data
        if ($this instanceof GoogleMaps) {
            return file_get_contents(__DIR__ . '/../../tests/fixtures/GoogleMaps.json');
        }
        if ($this instanceof OpenStreetMap) {
            return file_get_contents(__DIR__ . '/../../tests/fixtures/OpenStreetMap.json');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // NOTE: OpenStreetMap API requires a good User Agent
        curl_setopt(
            $ch,
            CURLOPT_USERAGENT,
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36'
        );

        $data = curl_exec($ch);

        if (!$data || curl_error($ch)) {
            curl_close($ch);
            return null;
        }
        curl_close($ch);

        return $data;
    }

    public function extractLatLng($data): array
    {
        return [];
    }
}
