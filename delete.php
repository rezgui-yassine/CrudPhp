<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $file = 'stock.txt';

    $clients = json_decode(file_get_contents($file), true);

    foreach ($clients as $key => $client) {
        if ($client['id'] == $id) {
            unset($clients[$key]);
            break;
        }
    }

    file_put_contents($file, json_encode(array_values($clients)));

    header("Location: /index.php");
    exit;
}
?>
