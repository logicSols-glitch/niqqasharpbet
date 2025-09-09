<?php
// Assuming you've already set up a connection to your database
include 'database_connection.php';

// SQL query to delete all bets
$sql = "DELETE FROM bet_history"; // Replace with your actual table name

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}
$conn->close();
?>
<script>
    function clearBetHistory() {
    fetch('clear_bet_history.php', { method: 'POST' })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                const betHistoryContainer = document.getElementById('bet-history');
                betHistoryContainer.innerHTML = '<p>No active bets.</p>';
                alert('All bets have been cleared.');
            } else {
                alert('Failed to clear bets: ' + data.message);
            }
        })
        .catch(error => console.error('Error clearing bet history:', error));
}

</script>