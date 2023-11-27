<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Poppleton Dog Show Home</title>
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
    // SQL query for total entries
    $sql = "SELECT COUNT(*) AS total_entries FROM owners";
    // Execute the query
    $result = $conn->query($sql);
    // Check for errors
    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }
    // Fetch the results
    $row = $result->fetch_assoc();
    // Store the total number of entries
    $totalOwnerEntries = $row['total_entries'];
    // SQL query for total entries
    $sql = "SELECT COUNT(*) AS total_entries FROM dogs";
    // Execute the query
    $result = $conn->query($sql);
    //
    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }
    // Fetch the results
    $row = $result->fetch_assoc();
    // Store the total number of entries
    $totalDogEntries = $row['total_entries'];
    // SQL query for total entries
    $sql = "SELECT COUNT(*) AS total_entries FROM events";
    // Execute the query
    $result = $conn->query($sql);
    // Check for errors
    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }
    // Fetch the results
    $row = $result->fetch_assoc();
    // Store the total number of entries
    $totalEventEntries = $row['total_entries'];
    // SQL query for top ten dogs
    $sql = "
        SELECT dogs.name, breeds.name as breed, AVG(entries.score) as average_score,
         owners.name as owner_name, owners.email as owner_email
        FROM entries
        JOIN dogs ON entries.dog_id = dogs.id
        JOIN breeds ON dogs.breed_id = breeds.id
        JOIN owners ON dogs.owner_id = owners.id
        GROUP BY dogs.name, breeds.name, owners.name, owners.email
        HAVING COUNT(entries.competition_id) > 1
        ORDER BY average_score DESC
        LIMIT 10;
        ";

    // Execute the query
    $result = $conn->query($sql);
    // Check for errors
    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }
    // Fetch the results
    $topDogs = $result->fetch_all(MYSQLI_ASSOC);
    // Close the connection
    $conn->close();
    ?>
    <!-- Display the results in header-->
    <h1>Welcome to Poppleton Dog Show! This year 
        <?php echo $totalOwnerEntries; ?> owners entered
        <?php echo $totalDogEntries; ?> dogs in
        <?php echo $totalEventEntries; ?> events
    </h1>
    <!-- Top ten dogs header for list -->
    <h2>Top Ten Dogs</h2>
<ul>
    <?php
    // Initialize the counter
    $counter = 1; // Start at 1
    // Loop through the top ten dogs
    foreach ($topDogs as $dog):
    ?>
            <li>
            <!-- Display the dog's details in list format-->
            <strong>Rank:</strong> <?php echo $counter; ?><br>
            <strong>Dog Name:</strong> <?php echo htmlspecialchars($dog['name']); ?><br>
            <strong>Breed:</strong> <?php echo htmlspecialchars($dog['breed']); ?><br>
            <strong>Average Score:</strong> <?php echo number_format($dog['average_score'], 1); ?><br>
            <strong>Owner:</strong> <a href="owner.php?name=<?php echo urlencode($dog['owner_name']); ?>">
            <?php echo htmlspecialchars($dog['owner_name']); ?>
            </a><br>
            <strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($dog['owner_email']); ?>">
            <?php echo htmlspecialchars($dog['owner_email']); ?>
            </a>
        </li>
    <?php
        // Increment the counter
        $counter++; // Increment the counter
    endforeach;
    ?>
    </ul>
</body>

</html>