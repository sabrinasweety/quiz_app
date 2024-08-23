<?php
// Include the database connection
include 'db.php';

$score = 0;

// Fetch all questions from the database
$query = "SELECT * FROM questions";
$result = $conn->query($query);

// Calculate the score
while ($row = $result->fetch_assoc()) {
    $questionId = $row['id'];
    if (isset($_POST["q$questionId"]) && $_POST["q$questionId"] == $row['correct_option']) {
        $score++;
    }
}
$totalQuestions = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional: link to your CSS file -->
</head>
<body>

<h1>Quiz Results</h1>

<p>You scored <?php echo $score; ?> out of <?php echo $totalQuestions; ?>.</p>
<p><?php echo $score / $totalQuestions * 100; ?>% correct</p>

<a href="index.php">Try Again</a>

</body>
</html>
