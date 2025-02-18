<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $module = $_POST['module'];
    $videos = $_POST['videos'];  // مصفوفة تحتوي على روابط الفيديو
    $pdfs = $_POST['pdfs'];      // مصفوفة تحتوي على روابط ملفات PDF

    // إضافة الدرس إلى جدول lessons
    $stmt = $pdo->prepare("INSERT INTO lessons (title, year, module) VALUES (?, ?, ?)");
    $stmt->execute([$title, $year, $module]);
    $lesson_id = $pdo->lastInsertId();

    // إضافة الفيديوهات
    if (!empty($videos)) {
        foreach ($videos as $video) {
            if (!empty($video)) {
                $stmt = $pdo->prepare("INSERT INTO lesson_videos (lesson_id, video_url) VALUES (?, ?)");
                $stmt->execute([$lesson_id, $video]);
            }
        }
    }

    // إضافة ملفات PDF
    if (!empty($pdfs)) {
        foreach ($pdfs as $pdf) {
            if (!empty($pdf)) {
                $stmt = $pdo->prepare("INSERT INTO lesson_pdfs (lesson_id, pdf_url) VALUES (?, ?)");
                $stmt->execute([$lesson_id, $pdf]);
            }
        }
    }

    echo "تمت إضافة الدرس بنجاح!";
}
?>
<form action="dashboard.php" method="POST">
    <label>عنوان الدرس:</label>
    <input type="text" name="title" required><br>

    <label>السنة:</label>
    <input type="number" name="year" required><br>

    <label>المقياس:</label>
    <input type="text" name="module" required><br>

    <label>روابط الفيديو:</label>
    <div id="videoInputs">
        <input type="text" name="videos[]" placeholder="أدخل رابط فيديو">
    </div>
    <button type="button" onclick="addVideoInput()">إضافة فيديو آخر</button><br>

    <label>روابط ملفات PDF:</label>
    <div id="pdfInputs">
        <input type="text" name="pdfs[]" placeholder="أدخل رابط PDF">
    </div>
    <button type="button" onclick="addPdfInput()">إضافة ملف PDF آخر</button><br>

    <button type="submit">إضافة الدرس</button>
</form>

<script>
    function addVideoInput() {
        let div = document.createElement("div");
        div.innerHTML = '<input type="text" name="videos[]" placeholder="أدخل رابط فيديو">';
        document.getElementById("videoInputs").appendChild(div);
    }

    function addPdfInput() {
        let div = document.createElement("div");
        div.innerHTML = '<input type="text" name="pdfs[]" placeholder="أدخل رابط PDF">';
        document.getElementById("pdfInputs").appendChild(div);
    }
</script>
