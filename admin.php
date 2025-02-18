<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $year = $_POST["year"];
    $module = $_POST["module"];

    // إضافة الدرس
    $sql = "INSERT INTO lessons (title, year, module) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $title, $year, $module);

    if ($stmt->execute()) {
        echo "<p>✅ تم إضافة الدرس بنجاح!</p>";
    } else {
        echo "<p>❌ خطأ: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة درس جديد</title>
</head>
<body>
    <h2>📚 إضافة درس جديد</h2>
    <form method="POST">
        <label>عنوان الدرس:</label>
        <input type="text" name="title" required>
        <br>

        <label>السنة الدراسية:</label>
        <input type="number" name="year" required>
        <br>

        <label>المقياس:</label>
        <input type="text" name="module" required>
        <br>

        <button type="submit">إضافة الدرس</button>
    </form>
</body>
</html>
