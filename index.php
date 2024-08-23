<?php
// Include the database connection
include 'db.php';

// Fetch questions from the database
$query = "SELECT * FROM questions";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: link to your CSS file -->
</head>
<body>

<h1>Quiz Application</h1>

<form action="result.php" method="post">
    <?php while ($row = $result->fetch_assoc()): ?>
        <fieldset>
            <legend><?php echo htmlspecialchars($row['question']); ?></legend>
            <label>
                <input type="radio" name="q<?php echo $row['id']; ?>" value="1" required>
                <?php echo htmlspecialchars($row['option1']); ?>
            </label><br>
            <label>
                <input type="radio" name="q<?php echo $row['id']; ?>" value="2">
                <?php echo htmlspecialchars($row['option2']); ?>
            </label><br>
            <label>
                <input type="radio" name="q<?php echo $row['id']; ?>" value="3">
                <?php echo htmlspecialchars($row['option3']); ?>
            </label><br>
            <label>
                <input type="radio" name="q<?php echo $row['id']; ?>" value="4">
                <?php echo htmlspecialchars($row['option4']); ?>
            </label>
        </fieldset>
    <?php endwhile; ?>
    <button type="submit">Submit Quiz</button>
</form>

</body>
</html>
