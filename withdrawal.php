<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal</title>
</head>
<body>
    <h2>Withdraw Funds</h2>
    <form action="process_withdrawal.php" method="POST">
        <label for="bank">Select Bank:</label>
        <select name="bank" id="bank" required>
            <option value="044">Access Bank</option>
            <option value="011">First Bank</option>
            <option value="058">GTBank</option>
            <option value="057">Zenith Bank</option>
            <!-- Add more banks as necessary -->
        </select><br><br>

        <label for="account_number">Account Number:</label>
        <input type="text" id="account_number" name="account_number" required><br><br>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required><br><br>

        <button type="submit">Withdraw</button>
    </form>
</body>
</html>
