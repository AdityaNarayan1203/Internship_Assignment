<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (!isset($_SESSION['email'])) {
    header('location:index.php');
    exit;
}

include 'connect.php'; // Include the database connection file

$email = $_SESSION['email'];

// Fetch the username from the database based on the email
$sql_username = "SELECT name FROM `assi` WHERE email = '$email'";
$result_username = mysqli_query($conn, $sql_username);
$row_username = mysqli_fetch_assoc($result_username);
$name = $row_username['name'];

// Fetch all entries from the "assi" table
$sql_entries = "SELECT * FROM `assi`";
$result_entries = mysqli_query($conn, $sql_entries);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 50px;
        }

        .welcome-message {
            margin-bottom: 20px;
        }

        .user-table {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .user-table th {
            background-color: #f0f0f0;
            border-bottom: 1px solid #ddd;
        }

        .user-table td,
        .user-table th {
            padding: 12px 15px;
            text-align: left;
        }

        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Dashboard</h1>
    <p class="welcome-message">Welcome, <?php echo $name;?>!</p>
    <div class="user-table">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Ph. No.</th>
                <th>DOB</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row_entry = mysqli_fetch_assoc($result_entries)) : ?>
                <tr>
                    <td><?php echo $row_entry['name']; ?></td>
                    <td><?php echo $row_entry['email']; ?></td>
                    <td><?php echo $row_entry['number']; ?></td>
                    <td><?php echo $row_entry['date']; ?></td>
                    <td><?php echo $row_entry['gender']; ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <a href="logout.php" class="btn btn-danger logout-btn">Logout</a>
</div>
</body>
</html>
