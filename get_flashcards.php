<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'db.php';
try {

    $lesson_id = isset($_GET['lesson_id']) ? intval($_GET['lesson_id']) : 1;

    $stmt = $pdo->prepare("SELECT question, answer FROM flashcards WHERE lesson_id = ?");
    $stmt->execute([$lesson_id]);
    $flashcards = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($flashcards);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
