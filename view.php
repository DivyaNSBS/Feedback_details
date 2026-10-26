
<?php
include("db.php");
$sql = "SELECT * FROM feedbacktbl ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
</head>
<body>
    <div class="container">
        <h1>Feedback Details</h1>
        <table border="1">
        <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Feedback</th>
        </tr>
    <?php while ($row = mysqli_fetch_assoc($result)){?>
        <tr>
        <td><?php echo (int)$row['id'];?></td>
        <td><?php echo htmlspecialchars($row['name']);?></td>
        <td><?php echo htmlspecialchars($row['email']);?></td>
        <td><?php echo htmlspecialchars($row['feedback']);?></td>
        </tr>
    <?php } ?>
</table>
    <br>
    <a href="index.php">Back</a>
    </div>
</body>
</html>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>
