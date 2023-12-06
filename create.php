<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = 'stock.txt';

    // Read existing clients from the file
    $fileContent = file_get_contents($file);

    // Check if the file is empty or not valid JSON
    $clients = json_decode($fileContent, true) ?? [];

    // Create a new client
    $newClient = [
        'id' => count($clients) + 1,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Add the new client to the array
    $clients[] = $newClient;

    // Debugging: Output the clients array
    var_dump($clients);

    // Write the updated array back to the file
    $result = file_put_contents($file, json_encode($clients, JSON_PRETTY_PRINT));

    if ($result === false) {
        echo "Error writing to file: " . error_get_last()['message'];
    } else {
        echo "Client added successfully.";
    }

    // Redirect to the index page
    header("Location: /index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <form method="post">
            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" id="phone" name="phone" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" id="address" name="address" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
