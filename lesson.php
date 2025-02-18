<?php
include 'db.php';

$lesson_id = $_GET['id']; // نأخذ معرف الدرس من الرابط

// جلب معلومات الدرس
$stmt = $pdo->prepare("SELECT * FROM lessons WHERE id = ?");
$stmt->execute([$lesson_id]);
$lesson = $stmt->fetch();

// جلب الفيديوهات
$stmt = $pdo->prepare("SELECT video_url FROM lesson_videos WHERE lesson_id = ?");
$stmt->execute([$lesson_id]);
$videos = $stmt->fetchAll();

// جلب ملفات PDF
$stmt = $pdo->prepare("SELECT pdf_url FROM lesson_pdfs WHERE lesson_id = ?");
$stmt->execute([$lesson_id]);
$pdfs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lesson['title']; ?></title>
</head>
<body>

<h1><?php echo $lesson['title']; ?></h1>
<h2>السنة: <?php echo $lesson['year']; ?> - المقياس: <?php echo $lesson['module']; ?></h2>

<h3>فيديوهات الدرس</h3>
<?php foreach ($videos as $video): ?>
    <iframe width="560" height="315" src="<?php echo $video['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
<?php endforeach; ?>

<h3>ملفات PDF</h3>
<?php foreach ($pdfs as $pdf): ?>
    <a href="<?php echo $pdf['pdf_url']; ?>" target="_blank">📄 تحميل الملف</a><br>
<?php endforeach; ?>

</body>
</html>
