<?php
session_start();
include 'php/config.php'; // Database connection

// Ensure only admin users can access this page
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: admin_login.php"); // Redirect to login if not admin
    exit();
}

$message = ''; // Initialize a variable to store messages

// Handle form submission to update scores
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['match_id'], $_POST['home_score'], $_POST['away_score'])) {
        $match_id = $_POST['match_id'];
        $home_score = $_POST['home_score'];
        $away_score = $_POST['away_score'];

        // Update the scores in the database
        $stmt = $conn->prepare("UPDATE matches SET home_score = ?, away_score = ? WHERE match_id = ?");
        $stmt->bind_param("iii", $home_score, $away_score, $match_id);

        if ($stmt->execute()) {
            $message = 'Scores updated successfully!';
        } else {
            $message = 'Failed to update scores: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = 'Please fill out all fields.';
    }
}

// Fetch matches for the dropdown
$matches = [];
$result = $conn->query("SELECT match_id, home_team, away_team FROM matches");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $matches[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update Scores</title>
</head>
<body>
    <h1>Update Matchi Scores</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="match_id">Select Match:</label>
        <select name="match_id" id="match_id" required>
            <option value="" disabled selected>Select a match</option>
            <?php foreach ($matches as $match): ?>
                <option value="<?php echo $match['match_id']; ?>">
                    <?php echo $match['home_team'] . ' vs ' . $match['away_team']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="home_score">Home Score:</label>
        <input type="number" name="home_score" id="home_score" required>
        <br>
        <label for="away_score">Away Score:</label>
        <input type="number" name="away_score" id="away_score" required>
        <br>
        <button type="submit">Update Scores</button>
    </form>
</body>
</html>
