<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Owner Details</title>
</head>

<body>
    <?php
    // Include the database connection details
    require_once("DbalUtils.php");
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get the owner's name from the URL parameter
    $ownerName = urldecode($_GET['name']);
    // Query to retrieve owner details
    $sql = "SELECT * FROM owners WHERE name = ?";
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    // Bind the parameter
    $stmt->bind_param("s", $ownerName);
    // Execute the query
    $stmt->execute();
    //Get results
    $result = $stmt->get_result();
    // Check for errors
    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }
    // Fetch the owner's details
    $ownerDetails = $result->fetch_assoc();
    // Close the connection
    $conn->close();
    ?>
    <!-- Display the owner's details -->
    <h1>Owner Details</h1>
    <ul>
        <li><strong>Name:</strong> <?php echo htmlspecialchars($ownerDetails['name']); ?></li>
        <li><strong>Email:</strong> <?php echo htmlspecialchars($ownerDetails['email']); ?></li>
        <li><strong>Phone:</strong> <?php echo htmlspecialchars($ownerDetails['phone']); ?></li>
        <li><strong>Address:</strong> <?php echo htmlspecialchars($ownerDetails['address']); ?></li>
    </ul>

</body>

</html>
