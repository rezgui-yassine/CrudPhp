<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container my-5">
        <h2>List of clients</h2>
        <a class="btn btn-primary" href="/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file = 'stock.txt';
                $clients = json_decode(file_get_contents($file), true);

                if (!empty($clients)) {
                    foreach ($clients as $client) {
                        echo "
                            <tr>
                                <td>{$client['id']}</td>
                                <td>{$client['name']}</td>
                                <td>{$client['email']}</td>
                                <td>{$client['phone']}</td>
                                <td>{$client['address']}</td>
                                <td>{$client['created_at']}</td>
                                <td>
                                    <a class='btn btn-primary' href='/edit.php?id={$client['id']}' role='button'>Edit</a>
                                    <a class='btn btn-danger' href='/delete.php?id={$client['id']}' role='button'>Delete</a>
                                </td>
                            </tr>
                        ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>