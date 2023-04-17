<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$api_key = 'vkiMy0RO59DxaJSc'; // Exclusive API Key

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 50;
$offset = ($page - 1) * $limit;

if (isset($_GET['all'])) {
    $url = 'https://api.tarkov-market.app/api/v1/items/all?x-api-key=' . $api_key . '&limit=' . $limit . '&offset=' . $offset;
} else {
    $query = urlencode($_GET['q']);
    $url = 'https://api.tarkov-market.app/api/v1/item?q=' . $query . '&x-api-key=' . $api_key;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-api-key: ' . $api_key
));
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36');

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['error' => 'An error occurred while fetching data from the Tarkov Market API: ' . curl_error($ch)]);
} else {
    $data = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        echo $response;
    } else {
        echo json_encode(['error' => 'The Tarkov Market API returned non-JSON data.']);
    }
}

curl_close($ch);
?>
