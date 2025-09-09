<?php
include 'php/config.php'; // Database connection

// Fetch all match details
$result = $conn->query("SELECT * FROM matches ORDER BY match_date DESC");

$matches = [];
if ($result->num_rows > 0) {
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
    <title>Match Scores</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .match-container { max-width: 800px; margin: auto; }
        .match-entry { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f9f9f9; }
        .match-entry h3 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="match-container">
        <h1>Live Match Scores</h1>
        <?php if (count($matches) > 0): ?>
            <?php foreach ($matches as $match): ?>
                <div class="match-entry">
                    <h3><?php echo $match['home_team']; ?> vs <?php echo $match['away_team']; ?></h3>
                    <p><strong>Date:</strong> <?php echo $match['match_date']; ?></p>
                    <p><strong>Score:</strong> <?php echo $match['home_score']; ?> - <?php echo $match['away_score']; ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No matches available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<p><strong>Status:</strong>
    <?php
    if ($match['home_score'] > $match['away_score']) {
        echo $match['home_team'] . " Won";
    } elseif ($match['home_score'] < $match['away_score']) {
        echo $match['away_team'] . " Won";
    } else {
        echo "Draw";
    }
    ?>
</p>
    