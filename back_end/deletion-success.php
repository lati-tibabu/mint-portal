<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletion Successful</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #f44336; /* Red color for deletion success */
        }

        p {
            font-size: 18px;
        }

        .success-icon {
            font-size: 72px;
            color: #f44336; /* Red color for deletion success */
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f44336; /* Red color for deletion success */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <i class="success-icon">&#10004;</i>
        <h1>Deletion Successful</h1>
        <p>The deletion was successful.</p>
        <a href="../user-management/dashboard.php" class="btn-back">Back</a>
    </div>
</body>
</html>
