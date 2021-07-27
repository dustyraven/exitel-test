<?php declare(strict_types=1);

use DataSource\DataSource;
use Geocode\Geocode;
use Provider\GoogleMaps;
use Provider\OpenStreetMap;

require __DIR__ . '/vendor/autoload.php';

$dataSource = new DataSource;

$result = [
    (new Geocode($dataSource, new GoogleMaps))->getGeocode(),
    (new Geocode($dataSource, new OpenStreetMap))->getGeocode(),
];

header("Access-Control-Allow-Origin: *"); // avoid CORS issues
header('Content-Type: application/json');
echo json_encode($result);
