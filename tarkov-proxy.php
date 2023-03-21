<?php
error_reporting(0);
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$headers = ['Content-Type: application/json'];

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 50;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;


$query = sprintf('{
  items(limit: %d, offset: %d) {
    id
    name
    shortName
    basePrice
    traderPrices {
      trader {
        name
      }
      price
    }
    avg24hPrice
  }
}', $limit, $offset);

$context = stream_context_create([
  'http' => [
    'method' => 'POST',
    'header' => implode("\r\n", $headers),
    'content' => json_encode(['query' => $query]),
  ]
]);

$data = @file_get_contents('https://api.tarkov.dev/graphql', false, $context);

if ($data === false) {
    echo json_encode(['error' => 'An error occurred while fetching data from the API.']);
} else {
    echo $data;
}
?>
