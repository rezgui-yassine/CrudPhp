<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = 'stock.txt';

    // Read existing clients from the file
    $clients = json_decode(file_get_contents($file), true);

    $id = $_POST['id'];

    foreach ($clients as &$client) {
        if ($client['id'] == $id) {
            $client['name'] = isset($_POST['name']) ? $_POST['name'] : '';
            $client['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $client['phone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
            $client['address'] = isset($_POST['address']) ? $_POST['address'] : '';
            break;
        }
    }

    file_put_contents($file, json_encode($clients, JSON_PRETTY_PRINT));

    header("Location: /index.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $file = 'stock.txt';
    $clients = json_decode(file_get_contents($file), true);

    $id = $_GET['id'];
    $selectedClient = null;

    foreach ($clients as $client) {
        if ($client['id'] == $id) {
            $selectedClient = $client;
            break;
        }
    }
} else {
    header("Location: /index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>Edit Client</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $selectedClient['id']; ?>">

            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" id="name" name="name" value="<?php echo $selectedClient['name']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" id="email" name="email" value="<?php echo $selectedClient['email']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" id="phone" name="phone" value="<?php echo $selectedClient['phone']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" id="address" name="address" value="<?php echo $selectedClient['address']; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
