<?php
// Connect to MySQL using environment variables
$host = getenv('MYSQL_HOST');
$db = getenv('MYSQL_DATABASE');
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
$conn = new mysqli($host, $user, $pass, $db);

// If connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['svsFile'])) {
    $file = $_FILES['svsFile'];
    $target = "uploads/" . basename($file["name"]);

    if (move_uploaded_file($file["tmp_name"], $target)) {
        $stmt = $conn->prepare("INSERT INTO svs_files (filename) VALUES (?)");
        $stmt->bind_param("s", $file["name"]);
        $stmt->execute();
        echo "<p style='color:green;'>File uploaded and saved!</p>";
    } else {
        echo "<p style='color:red;'>Upload failed.</p>";
    }
}
?>

<h2>Upload SVS File</h2>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="svsFile" accept=".svs" required>
  <button type="submit">Upload</button>
</form>
