
<?php
include("db.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['message'];
    $sql = "INSERT INTO feedbacktbl (name, email, feedback)
            VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,"sss",$name,$email,$feedback);
    if (mysqli_stmt_execute($stmt)) {
    echo "<script>
            alert('Feedback submitted successfully');
            window.location.href='index.php';
          </script>";
    exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>
    <form action="" method="post">
        <h2>Feedback Form</h2>
        <label>Name</label>
        <input type="text" name="name" required><br><br>
        <label>Email</label>
        <input type="email" name="email" required><br><br>
        <label>Feedback</label>
        <textarea name="message" rows="5" required></textarea><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="view.php">View Feedback</a>
</body>
</html>
