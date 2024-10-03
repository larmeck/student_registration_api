<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


require 'db.php';


$query = "SELECT * FROM students";
$stmt = $pdo->prepare($query);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($students);
} else {
    echo json_encode(['message' => 'No students found']);
}
?>
