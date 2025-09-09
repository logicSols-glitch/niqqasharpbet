<?php
include 'php/config.php';

// Fetch matches from the database
$sql = "SELECT match_id, home_team, away_team, home_score, away_score, match_status, match_start_time 
        FROM matches ORDER BY match_status ASC, match_start_time DESC";
$result = $conn->query($sql);

$matches = [];
while ($row = $result->fetch_assoc()) {
    $matches[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NiqqasharpBet</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Sportybet-inspired styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1e;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .match-section {
            padding: 20px;
            margin-bottom: 15px;
            border-bottom: 1px solid #333;
        }
        .match-section h2 {
            color: #ffcc00;
            margin-bottom: 10px;
        }
        .match-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .match-card {
            flex: 1 1 calc(33.33% - 15px);
            background: #2c2c2e;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .match-card.live {
            border: 2px solid #28a745;
        }
        .match-card.finished {
            border: 2px solid #ffcc00;
        }
        .match-card h3 {
            margin: 0;
            font-size: 18px;
        }
        .match-info {
            margin-top: 10px;
            font-size: 14px;
            color: #b0b0b0;
        }
        .match-score {
            font-size: 16px;
            color: #ffcc00;
        }
        .match-time {
            font-size: 14px;
            color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="match-section">
        <h2>Upcoming Matches</h2>
        <div class="match-container">
            <?php foreach ($matches as $match): ?>
                <?php if ($match['match_status'] === 'upcoming'): ?>
                    <div class="match-card" data-match-id="<?php echo $match['match_id']; ?>">
                        <h3><?php echo htmlspecialchars($match['home_team']); ?> vs <?php echo htmlspecialchars($match['away_team']); ?></h3>
                        <div class="match-info">
                            Starts at: <?php echo date('h:i A', strtotime($match['match_start_time'])); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="match-section">
        <h2>Live Matches</h2>
        <div class="match-container">
            <?php foreach ($matches as $match): ?>
                <?php if ($match['match_status'] === 'live'): ?>
                    <div class="match-card live" data-match-id="<?php echo $match['match_id']; ?>">
                        <h3><?php echo htmlspecialchars($match['home_team']); ?> vs <?php echo htmlspecialchars($match['away_team']); ?></h3>
                        <div class="match-score">Score: <?php echo $match['home_score'] . ' - ' . $match['away_score']; ?></div>
                        <div class="match-time" id="time-<?php echo $match['match_id']; ?>">Time: Calculating...</div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="match-section">
        <h2>Finished Matches</h2>
        <div class="match-container">
            <?php foreach ($matches as $match): ?>
                <?php if ($match['match_status'] === 'finished'): ?>
                    <div class="match-card finished" data-match-id="<?php echo $match['match_id']; ?>">
                        <h3><?php echo htmlspecialchars($match['home_team']); ?> vs <?php echo htmlspecialchars($match['away_team']); ?></h3>
                        <div class="match-score">Final Score: <?php echo $match['home_score'] . ' - ' . $match['away_score']; ?></div>
                        <div class="match-time">Status: FT</div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        // Function to fetch and update live match times and scores
        function fetchLiveMatchUpdates() {
            fetch('fetch_scores.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(match => {
                        const matchCard = document.querySelector(`[data-match-id="${match.match_id}"]`);
                        if (matchCard && match.match_status === 'live') {
                            const scoreElement = matchCard.querySelector('.match-score');
                            const timeElement = matchCard.querySelector('.match-time');

                            // Calculate elapsed time
                            const matchStartTime = new Date(match.match_start_time);
                            const currentTime = new Date();
                            const elapsedMinutes = Math.floor((currentTime - matchStartTime) / 60000);

                            let displayTime;
                            if (elapsedMinutes < 45) {
                                displayTime = `${elapsedMinutes}:00 H1`;
                            } else if (elapsedMinutes < 60) {
                                displayTime = '45:00 HT';
                            } else {
                                displayTime = `${elapsedMinutes - 15}:00 H2`;
                            }

                            scoreElement.textContent = `Score: ${match.home_score} - ${match.away_score}`;
                            timeElement.textContent = `Time: ${displayTime}`;
                        }
                    });
                })
                .catch(error => console.error('Error fetching match updates:', error));
        }

        // Update live matches every 10 seconds
        setInterval(fetchLiveMatchUpdates, 10000);
        fetchLiveMatchUpdates(); // Initial call
    </script>
</body>
</html>
